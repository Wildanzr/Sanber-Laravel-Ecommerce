@extends('dashboard.polluxui.partials.master')

@section('title')
    Store Product
@endsection

@section('content')
    <div class="row">
        @forelse ($products as $item)
            <div class="col-4">
                <div class="card mb-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/' . $item->picture) }}" alt="Card image cap"
                        style="width: 286px; height: 195px; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex row justify-content-between">
                            <p class="card-title">{{ $item->name }}</p>
                            <span class="card-title">Rp: {{ $item->price }}</span>
                        </div>
                        <div class="d-flex row justify-content-between mb-2">
                            <p class="card-text">Available: {{ $item->stock }}</p>
                        </div>

                        <form action="/order" method="post">
                            @csrf
                            @method('post')

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-info btn-rounded btn-icon" onclick=addToCart({{$item}})>
                                    <i class="typcn typcn-plus"></i>
                                </button>
                                <input type="submit" value="Buy Now" class="btn btn-danger btn-sm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <h3>Tidak Ada Produk Terkini</h3>
        @endforelse
    </div>
@endsection
