@extends('layouts.app')

@section('title', 'Edit Data Petugas')

@section('content')
<div class="container">
    <h1>Edit Data Petugas</h1>
    
    <form action="{{ route('admin.petugas.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label>Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}">
        </div>

        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $user->telepon }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-primary" href="{{ route('admin.petugas.index') }}">Kembali</a>
    </form>
</div>
@endsection
