@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Produk</h1>

    <!-- Tombol Logout -->
    <div class="d-flex justify-content-end mb-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    @if ($products->isEmpty())
        <div class="alert alert-info text-center">Belum ada produk tersedia.</div>
    @else
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="No Image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <h6 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
