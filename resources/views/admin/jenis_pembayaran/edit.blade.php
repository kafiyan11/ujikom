<!-- resources/views/jenis_pembayaran/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jenis Pembayaran</h1>

    <form action="{{ route('jenis_pembayaran.update', $jenisPembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $jenisPembayaran->name }}" required>
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $jenisPembayaran->tipe }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
