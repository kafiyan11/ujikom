@extends('layouts.app')

@section('title', 'Data Konsumen')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Konsumen</h2>
            <a href="{{ route('konsumens.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Konsumen
            </a>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konsumens as $index => $konsumen)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td> <!-- Display row number -->
                            <td>{{ $konsumen->nama }}</td>
                            <td>{{ $konsumen->email }}</td>
                            <td>{{ $konsumen->telepon }}</td>
                            <td>{{ Str::limit($konsumen->alamat, 50) }}</td>
                            <td class="text-center">
                                <!-- Button Group for Edit and Delete -->
                                <div class="btn-group" role="group" aria-label="Aksi">
                                    <!-- Edit Button -->
                                    <a href="{{ route('konsumens.edit', $konsumen) }}" class="btn btn-warning btn-sm shadow-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <!-- Delete Button -->
                                    <form action="{{ route('konsumens.destroy', $konsumen) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
