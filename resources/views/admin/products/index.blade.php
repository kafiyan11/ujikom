@extends('layouts.app')

@section('title', 'Data Products')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Produk
        </a>
    </div>
    <br>
    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('products.index') }}" method="GET" class="d-flex align-items-center">
            <label for="perPage" class="mr-2 mb-0">Tampilkan:&nbsp;</label>
            <select name="perPage" id="perPage" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
            </select>
        </form>
    </div>
    <br>    
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Kode Produk</th>
                <th>Nama</th>
                <th>Harga / Kg</th>
                <th>Deskripsi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ 'Rp. ' . number_format($product->harga, 0, ',', '.') }}</td>
                    <td>{{ $product->description }}</td>
                    <td class="text-center">
                        <!-- Tombol Edit dengan Ikon -->
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <!-- Tombol Hapus dengan Ikon -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $products->appends(request()->query())->links() }}
    </div>
</div>
@endsection
