<!-- resources/views/jenis_pembayaran/index.blade.php -->
@extends('layouts.app')

@section('title', 'Jenis Pembayaran')
@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Jenis Pembayaran</h1>
        <a href="{{ route('jenis_pembayaran.create') }}" class="btn btn-primary">Tambah Jenis Pembayaran</a>
    </div>

    @forelse ($jenisPembayaran as $name => $items)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white">
                <h2 class="h4 mb-0">{{ ucfirst($name) }}</h2>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($items as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $item->tipe }}</span>
                            <div>
                                <a href="{{ route('jenis_pembayaran.edit', $item->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{ route('jenis_pembayaran.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @empty
        <div class="alert alert-info">Belum ada data jenis pembayaran.</div>
    @endforelse
</div>
@endsection
