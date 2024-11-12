@extends('layouts.app')

@section('title', 'Data Layanan')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Layanan</h2>
        <a href="{{ route('layanan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Layanan
        </a>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Layanan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($layanan as $item)
                    <tr>
                        <td class="align-middle">{{ $item->nama_layanan }}</td>
                        <td class="align-middle">{{ $item->deskripsi }}</td>
                        <td class="align-middle">{{ number_format($item->harga, 0, ',', '.') }}</td> <!-- Format harga -->
                        <td class="align-middle text-center">
                            <a href="{{ route('layanan.edit', $item) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('layanan.destroy', $item) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
