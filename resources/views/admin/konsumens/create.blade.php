@extends('layouts.app')

@section('title', 'Tambah Data Konsumen')

@section('content')
    <h1>Tambah Konsumen</h1>

    <form action="{{ route('konsumens.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-primary" href="{{ route('konsumens.index') }}">Kembali</a>
    </form>
@endsection
