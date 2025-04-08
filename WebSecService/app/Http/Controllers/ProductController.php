<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('Employee')) {
            return view('products.index', ['products' => Product::all()]);
        }
        return view('products.index', ['products' => Product::where('stock', '>', 0)->get()]);
    }

    public function buy(Request $request, Product $product)
    {
        $user = auth()->user();

        if (!$user->hasRole('Customer')) {
            abort(403, 'Only customers can purchase.');
        }

        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'Product out of stock.');
        }

        if ($user->credit < $product->price) {
            return view('products.insufficient-credit');
        }

        try {
            DB::transaction(function () use ($user, $product) {
                $user->credit -= $product->price;
                $user->save();

                $product->stock -= 1;
                $product->save();

                Purchase::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ]);
            });

            return redirect()->route('purchases.index')->with('success', 'Product purchased successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Purchase failed. Please try again.');
        }
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasRole('Employee')) {
            abort(403);
        }
        $request->validate([
            'code' => 'required|string|max:64',
            'name' => 'required|string|max:256',
            'price' => 'required|numeric|min:0',
            'model' => 'required|string|max:128',
            'description' => 'nullable|string',
            'photo' => 'nullable|string|max:128',
            'stock' => 'required|integer|min:0',
        ]);
        Product::create($request->all());
        return redirect()->back()->with('success', 'Product added.');
    }

    public function update(Request $request, Product $product)
    {
        if (!auth()->user()->hasRole('Employee')) {
            abort(403);
        }
        $request->validate([
            'code' => 'required|string|max:64',
            'name' => 'required|string|max:256',
            'price' => 'required|numeric|min:0',
            'model' => 'required|string|max:128',
            'description' => 'nullable|string',
            'photo' => 'nullable|string|max:128',
            'stock' => 'required|integer|min:0',
        ]);
        $product->update($request->all());
        return redirect()->back()->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        if (!auth()->user()->hasRole('Employee')) {
            abort(403);
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted.');
    }

    public function listCustomers()
    {
        if (!auth()->user()->hasRole('Employee')) {
            abort(403);
        }
        $customers = User::role('Customer')->get();
        return view('employees.customers', ['customers' => $customers]);
    }

    public function addCredit(Request $request, User $customer)
    {
        if (!auth()->user()->hasRole('Employee')) {
            abort(403);
        }
        $request->validate(['credit' => 'required|numeric|min:0']);
        $customer->credit += $request->credit;
        $customer->save();
        return redirect()->back()->with('success', 'Credit added.');
    }
}