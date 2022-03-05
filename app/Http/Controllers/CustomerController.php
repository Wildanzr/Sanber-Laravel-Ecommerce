<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('dashboard.polluxui.customer.products', compact('products'));
    }
}
