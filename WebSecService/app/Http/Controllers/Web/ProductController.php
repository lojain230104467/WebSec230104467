<?php
namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth:web')->except('list');
    }

    public function list(Request $request)
    {
        $query = Product::query();

        if ($request->filled('keywords')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . e($request->keywords) . '%')
                  ->orWhere('code', 'like', '%' . e($request->keywords) . '%');
            });
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', (float) $request->min_price);
        }
        
        if ($request->filled('max_price')) {
            $query->where('price', '<=', (float) $request->max_price);
        }
        
        if ($request->filled('order_by')) {
            $allowedColumns = ['name', 'price', 'code', 'created_at'];
            $orderBy = in_array($request->order_by, $allowedColumns) ? $request->order_by : 'created_at';
            $orderDirection = in_array(strtoupper($request->order_direction), ['ASC', 'DESC']) ? strtoupper($request->order_direction) : 'ASC';
            $query->orderBy($orderBy, $orderDirection);
        }

        $products = $query->get();

        return view('products.list', [
            'products' => $products,
            'filters' => $request->only(['keywords', 'min_price', 'max_price', 'order_by', 'order_direction'])
        ]);
    }

    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->keywords) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keywords . '%')
                  ->orWhere('code', 'like', '%' . $request->keywords . '%');
            });
        }
        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }
        if ($request->order_by && $request->order_direction) {
            $query->orderBy($request->order_by, $request->order_direction);
        }

        $products = auth()->user() && auth()->user()->hasRole('Employee') 
            ? $query->get() 
            : $query->where('stock', '>', 0)->get();

        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('add_products')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'code' => 'required|string|max:255|unique:products',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'model' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0'
        ]);

        $filename = $this->handlePhotoUpload($request);

        $product = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'model' => $request->model,
            'description' => $request->description,
            'photo' => $filename,
            'stock' => $request->stock
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    private function handlePhotoUpload($request)
    {
        if (!$request->hasFile('photo')) {
            return null;
        }

        $file = $request->file('photo');
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        
        // Move the file to the public/images directory
        $file->move(public_path('images'), $filename);
        
        return $filename;
    }

    public function buy(Request $request, Product $product)
    {
        $user = auth()->user();
        if (!$user->hasRole('Customer')) {
            return redirect()->back()->with('error', 'Only customers can buy.');
        }

        try {
            $result = DB::transaction(function () use ($user, $product) {
                // Lock the rows for update to prevent race conditions
                $lockedProduct = Product::where('id', $product->id)
                    ->lockForUpdate()
                    ->first();
                
                $lockedUser = User::where('id', $user->id)
                    ->lockForUpdate()
                    ->first();

                if (!$lockedProduct || $lockedProduct->stock <= 0) {
                    throw new \Exception('Product is out of stock.');
                }

                if ($lockedUser->credit < $lockedProduct->price) {
                    throw new \Exception('Insufficient credit.');
                }

                $lockedUser->credit -= $lockedProduct->price;
                $lockedUser->save();
                
                $lockedProduct->stock -= 1;
                $lockedProduct->save();
                
                Purchase::create([
                    'user_id' => $lockedUser->id,
                    'product_id' => $lockedProduct->id,
                    'price_paid' => $lockedProduct->price
                ]);

                return true;
            }, 3); // Retry up to 3 times in case of deadlock

            return redirect()->back()->with('success', 'Product purchased successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, Product $product)
    {
        if (!auth()->user()->hasPermissionTo('edit_products')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'code' => 'required|string|max:255|unique:products,code,' . $product->id,
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'model' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0'
        ]);

        $data = $request->except('photo');
        
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($product->photo && file_exists(public_path('images/' . $product->photo))) {
                unlink(public_path('images/' . $product->photo));
            }
            
            $data['photo'] = $this->handlePhotoUpload($request);
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if (!auth()->user()->hasPermissionTo('delete_products')) {
            abort(403, 'Unauthorized');
        }

        try {
            // Delete the photo file if it exists
            if ($product->photo && file_exists(public_path('images/' . $product->photo))) {
                unlink(public_path('images/' . $product->photo));
            }
            
            $product->delete();
            return redirect()->route('products.index')
                ->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('products.index')
                ->with('error', 'Unable to delete product. It may be referenced by existing purchases.');
        }
    }

    public function edit(Request $request, Product $product = null)
    {
        if (!auth()->user()->hasPermissionTo('edit_products')) {
            abort(403, 'Unauthorized');
        }

        if (!$product) {
            $product = new Product();
        }
        return view('products.edit', compact('product'));
    }
}