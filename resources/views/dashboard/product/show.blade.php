@extends('dashboard.polluxui.partials.master')

@section('content')
<img src="{{ asset('images/'.$product->picture) }}" width="400px">
    <h1>{{ $product->name }}</h1>
    <h4>{{ $product->stock }}</h4>
    <p>{{ $product->description }}</p>
    <h2>{{ $product->price }}</h2>
@endsection