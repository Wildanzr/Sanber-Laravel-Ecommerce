@extends('dashboard.polluxui.partials.master')

@section('content')
<div class="row">
  @forelse ($product as $item)
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ asset('images/'.$item->picture) }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text">{{ $item->description }}</p>
      <a href="/product/{{ $item->id }}/show" class="btn btn-info btn-sm">Detail Produk</a>
      <a href="{{ url('product/edit') }}" class="btn btn-warning btn-sm">Edit Produk</a>
      <a href="#" class="btn btn-danger btn-sm">Delete Produk</a>
    </div>
  </div>
  @empty
      <h3>Tidak Ada Produk Terkini</h3>
  @endforelse
</div>
@endsection