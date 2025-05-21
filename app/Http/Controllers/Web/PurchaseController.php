<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function buy(Request $request, Product $product)
    {
        if (!auth()->user()->hasPermissionTo('buy_products')) abort(401);

        // Check if product is in stock
        if (!$product->isInStock()) {
            return redirect()->back()->withErrors('Sorry, this product is out of stock.');
        }

        // Check if user has enough credit
        if (!auth()->user()->hasEnoughCredit($product->price)) {
            return redirect()->back()->withErrors('Insufficient credit. Please add more credit to your account.');
        }

        // Start transaction
        DB::beginTransaction();
        try {
            // Create purchase record
            $purchase = new Purchase([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'price_at_purchase' => $product->price,
            ]);
            $purchase->save();

            // Deduct credit from user
            if (!auth()->user()->deductCredit($product->price)) {
                throw new \Exception('Failed to deduct credit');
            }

            // Reduce product stock
            if (!$product->reduceStock()) {
                throw new \Exception('Failed to reduce stock');
            }

            DB::commit();
            return redirect()->route('purchases')->with('message', 'Purchase successful!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Purchase failed. Please try again.');
        }
    }

    public function list()
    {
        if (!auth()->user()->hasPermissionTo('view_purchases')) abort(401);

        $purchases = auth()->user()->purchases()->with('product')->get();
        return view('purchases.list', compact('purchases'));
    }
} 