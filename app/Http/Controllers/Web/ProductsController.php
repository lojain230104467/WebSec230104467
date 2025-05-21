<?php
namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;

class ProductsController extends Controller {

	use ValidatesRequests;

	public function __construct()
    {
        $this->middleware('auth:web')->except('list');
        /*123*/
    }

	public function list(Request $request) {

		$query = Product::select("products.*");

		$query->when($request->keywords, 
		fn($q)=> $q->where("name", "like", "%$request->keywords%"));

		$query->when($request->min_price, 
		fn($q)=> $q->where("price", ">=", $request->min_price));
		
		$query->when($request->max_price, fn($q)=> 
		$q->where("price", "<=", $request->max_price));
		
		$query->when($request->order_by, 
		fn($q)=> $q->orderBy($request->order_by, $request->order_direction??"ASC"));

		$products = $query->get();

		return view('products.list', compact('products'));
	}

	public function edit(Request $request, Product $product = null) {

		if(!auth()->user()) return redirect('/');

		$product = $product??new Product();

		return view('products.edit', compact('product'));
	}

	public function save(Request $request, Product $product = null) {

		$this->validate($request, [
	        'code' => ['required', 'string', 'max:32'],
	        'name' => ['required', 'string', 'max:128'],
	        'model' => ['required', 'string', 'max:256'],
	        'description' => ['required', 'string', 'max:1024'],
	        'price' => ['required', 'numeric'],
	    ]);

		$product = $product??new Product();
		$product->fill($request->all());
		$product->save();

		return redirect()->route('products_list');
	}

	public function delete(Request $request, Product $product) {

		if(!auth()->user()->hasPermissionTo('delete_products')) abort(401);

		$product->delete();

		return redirect()->route('products_list');
	}

	public function review(Request $request, Product $product) {
		if(!auth()->user()->hasPermissionTo('add_review')) abort(401);
		
		return view('products.review', compact('product'));
	}

	public function saveReview(Request $request, Product $product) {
		if(!auth()->user()->hasPermissionTo('add_review')) abort(401);

		$this->validate($request, [
			'review' => ['required', 'string', 'max:1024'],
		]);

		$product->review = (string) $request->review;
		$product->save();

		return redirect()->route('products_list');
	}

	public function toggleFavorite(Request $request, Product $product) {
		if(!auth()->user()) abort(401);

		$favorite = $product->favorites()->where('user_id', auth()->id())->first();

		if($favorite) {
			$favorite->delete();
			$message = 'Product removed from favorites';
		} else {
			$product->favorites()->create(['user_id' => auth()->id()]);
			$message = 'Product added to favorites';
		}

		return redirect()->route('products_list')->with('message', $message);
	}

	public function manageInventory()
	{
		if (!auth()->user()->hasPermissionTo('manage_inventory')) abort(401);
		
		$products = Product::all();
		return view('products.inventory', compact('products'));
	}

	public function updateStock(Request $request, Product $product)
	{
		if (!auth()->user()->hasPermissionTo('manage_inventory')) abort(401);
		
		$this->validate($request, [
			'quantity' => 'required|integer|min:1',
		]);

		if ($product->addStock($request->quantity)) {
			return redirect()->route('products_manage_inventory')
				->with('message', 'Stock updated successfully for ' . $product->name);
		}

		return redirect()->back()->withErrors('Failed to update stock. Please try again.');
	}

	public function buy(Request $request, Product $product)
	{
		if (!auth()->user()->hasPermissionTo('buy_products')) {
			return redirect()->back()->withErrors('You do not have permission to buy products.');
		}

		$user = auth()->user();

		// Check if user has enough credit
		if ($user->credit < $product->price) {
			return redirect()->back()->withErrors('Insufficient credit balance.');
		}

		// Check if product is in stock
		if (!$product->isInStock()) {
			return redirect()->back()->withErrors('Product is out of stock.');
		}

		try {
			DB::beginTransaction();

			// Create purchase record
			$purchase = new Purchase();
			$purchase->user_id = $user->id;
			$purchase->product_id = $product->id;
			$purchase->price_at_purchase = $product->price;
			$purchase->save();

			// Deduct credit from user
			$user->credit -= $product->price;
			$user->save();

			// Reduce product stock
			if (!$product->reduceStock()) {
				throw new \Exception('Failed to reduce stock');
			}

			DB::commit();

			return redirect()->route('products_list')
				->with('message', 'Purchase successful! Thank you for your purchase.');
		} catch (\Exception $e) {
			DB::rollBack();
			Log::error('Purchase failed: ' . $e->getMessage());
			Log::error('Stack trace: ' . $e->getTraceAsString());
			return redirect()->back()->withErrors('Purchase failed: ' . $e->getMessage());
		}
	}
} 