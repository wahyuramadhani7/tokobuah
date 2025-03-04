@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Produk</h1>

    <!-- Tampilkan pesan error jika validasi gagal -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Produk</label>
            <input type="file" name="image" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>

            @if ($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
