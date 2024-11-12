@extends('layouts.app')

@section('title', 'Tambah Data Petugas')

@section('content')
<div class="container">
    <h1>Tambah Petugas</h1>
    
    <form action="{{ route('admin.petugas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>

        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-primary" href="{{ route('admin.petugas.index') }}">Kembali</a>
    </form>
</div>
@endsection
