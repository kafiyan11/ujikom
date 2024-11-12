@extends('layouts.app')

@section('title', 'Edit Data Layanan')

@section('content')
    <h1>Edit Layanan</h1>
    <form action="{{ route('layanan.update', $layanan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_layanan" class="form-label">Nama Layanan</label>
            <select name="nama_layanan" id="nama_layanan" class="form-control" required>
                <option value="Normal" {{ $layanan->nama_layanan == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Standar" {{ $layanan->nama_layanan == 'Standar' ? 'selected' : '' }}>Standar</option>
                <option value="Premium" {{ $layanan->nama_layanan == 'Premium' ? 'selected' : '' }}>Premium</option>
            </select>
        </div>        

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required>{{ $layanan->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ $layanan->harga }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-primary" href="{{ route('layanan.index') }}">Kembali</a>
    </form>
@endsection
