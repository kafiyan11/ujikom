@extends('layouts.app')

@section('title', 'Edit Data Konsumen')

@section('content')
    <h1>Edit Konsumen</h1>

    <form action="{{ route('konsumens.update', $konsumen) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $konsumen->nama }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $konsumen->email }}" required>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $konsumen->telepon }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $konsumen->alamat }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a class="btn btn-primary" href="{{ route('konsumens.index') }}">Kembali</a>

    </form>
@endsection
