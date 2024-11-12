@extends('layouts.app')

@section('title', 'Tambah Data Layanan')

@section('content')
    <h1>Tambah Layanan</h1>
    <form action="{{ route('layanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_layanan" class="form-label">Nama Layanan</label>
            <select name="nama_layanan" id="nama_layanan" class="form-control" required>
                <option value="Pilih">-- Pilih Layanan --</option>
                <option value="Normal">Normal</option>
                <option value="Standar">Standar</option>
                <option value="Premium">Premium</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-primary" href="{{ route('layanan.index') }}">Kembali</a>
    </form>
@endsection
