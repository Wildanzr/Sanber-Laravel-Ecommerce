<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $carts = Cart::where('user_id', auth()->user()->id)
            ->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->get();

        return view('dashboard.polluxui.customer.products', compact('products', 'carts'));
    }
}
