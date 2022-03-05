<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->get()->all();

        return view('dashboard/product/index', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'picture' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ],
        [
            'name.required' => 'Harap Masukkan Nama Produk',
            'stock.required' => 'Harap Masukkan Jumlah Stock Product',
            'description.required' => 'Harap Masukkan Description Produk',
            'picture.required' => 'Harap Masukkan Foto Produk',
            'price.required' => 'Harap Masukkan Harga Produk',
            'category_id.required' => 'Harap Masukkan Kategori Produk',
        ]
    );

        $fileName = time().'.'.$request->picture->extension();

        $category = new Product;

        $category->name = $request->name;
        $category->stock = $request->stock;
        $category->description = $request->description;
        $category->picture = $fileName;
        $category->price = $request->price;
        $category->category_id = $request->category_id;

        $category->save();
        $request->picture->move(public_path('images'), $fileName);

        return redirect('product/create')->with('success', 'Data anda berhasil ditambahkan');
    }

    public function create(){
        $category = Category::all();

        return view ('dashboard.product.create', compact('category'));
    }

    public function edit(){
        // $category = Category::all();
        // $product = Product::findorfail($id);

        // return view('dashboard.product.edit', compact('product', 'category'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('dashboard.product.show', compact('product'));
    }
}