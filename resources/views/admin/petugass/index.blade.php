@extends('layouts.app')

@section('title', 'Data Petugas')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Petugas</h2>
        <a href="{{ route('admin.petugas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Petugas
        </a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($petugas as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->telepon }}</td>
                <td>{{ $p->role }}</td>
                <td>
                    <a href="{{ route('admin.petugas.edit', $p->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.petugas.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
