<!-- resources/views/jenis_pembayaran/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jenis Pembayaran</h1>

    <form action="{{ route('jenis_pembayaran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" class="form-control" id="tipe" name="tipe" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
