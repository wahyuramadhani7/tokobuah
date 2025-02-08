@extends('layouts.app')

@section('content')
<h1>Daftar Buah</h1>
@foreach($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
        <a href="{{ url('products', $product->id) }}">Detail</a>
    </div>
@endforeach
@endsection
