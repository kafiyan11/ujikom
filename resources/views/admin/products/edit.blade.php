@extends('layouts.app')

@section('title', 'Edit Data Products')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga / Kg:</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $product->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi:</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-primary" href="{{ route('products.index') }}">Kembali</a>
    </form>
</div>
@endsection
