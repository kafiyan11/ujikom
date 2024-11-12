@extends('layouts.app')

@section('title', 'Tambah Data Products')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Produk</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga / Kg:</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi:</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-primary" href="{{ route('products.index') }}">Kembali</a>
    </form>
</div>
@endsection
