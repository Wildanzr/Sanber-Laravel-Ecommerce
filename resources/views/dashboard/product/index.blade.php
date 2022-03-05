@extends('dashboard.polluxui.partials.master')

@section('content')
<a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Product</a>
<div class="row m-3">
  @forelse ($product as $item)
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ asset('images/'.$item->picture) }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text">{{ $item->description }}</p>
      
      <form action="{{ route('product.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <a href="{{ route('product.show',$item->id) }}" class="btn btn-info btn-sm">Detail Produk</a>
        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit Produk</a>
        <input type="submit" value="Delete Product" class="btn btn-danger btn-sm">
      </form>
    </div>
  </div>
  @empty
      <h3>Tidak Ada Produk Terkini</h3>
  @endforelse
</div>
@endsection