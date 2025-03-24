<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function buy(Product $product)
    {
        if (Auth::user()->credit < $product->price) {
            return back()->with('error', 'Not enough credit');
        }

        Auth::user()->credit -= $product->price;
        $product->quantity -= 1;
        Auth::user()->save();
        $product->save();

        return back()->with('success', 'Purchase successful');
    }
}
