@extends('dashboard.polluxui.partials.master')

@section('content')
<br>
<h3>Edit Product</h3>
<br>
<div class="card mb-4">
    <div class="formcreate m-5">
        <form action="{{ route('product.show', $product->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $product->name }}" name="name">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label>Masukkan Kategori Produk</label>
                <br>
                <select name="category_id">
                    <option disabled>-- Pilih Kategori Produk --</option>
                    @foreach ($category as $item)
                    @if ($item->id === $product->category_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else 
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label>Stock</label>
                <input type="number" class="form-control" value="{{ $product->stock }}" id="exampleInputPassword1" name="stock">
            </div>
            @error('stock')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label>Deskripsi Produk</label>
                <input type="text" class="form-control" value="{{ $product->description }}" id="exampleInputPassword1" name="description">
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label>Gambar Produk</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="picture" value="{{ $product->picture }}">
            </div>
            @error('picture')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label>Harga Produk</label>
                <input type="number" class="form-control" value="{{ $product->price }}" name="price">
            </div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection