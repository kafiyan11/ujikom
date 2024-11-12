@extends('layouts.app')

@section('title', 'Orderan')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Orderan</h2>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Orderan
        </a>
    
    <a href="{{ route('orders.pdf') }}" class="btn btn-success mb-3">
        <i class="fas fa-file-pdf"></i> Cetak Laporan
    </a>
</div>        
    <br>
    <!-- Orders Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Konsumen</th>
                    <th>Produk</th>
                    <th>Layanan</th>
                    <th>Jenis Pembayaran</th> <!-- Kolom untuk Jenis Pembayaran -->
                    <th>Jumlah Order</th>
                    <th>Total Harga</th>
                    <th>Uang Diberikan</th>
                    <th>Uang Kembalian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->konsumen->nama }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->layanan->nama_layanan }}</td>
                    <td>{{ $order->jenisPembayaran->name }}</td> <!-- Menampilkan Nama Jenis Pembayaran -->
                    <td>{{ $order->jumlah_order }}</td>
                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($order->uang_diberikan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($order->uang_kembalian, 0, ',', '.') }}</td>
                    <td>
                        <!-- Edit Order Button -->
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Order">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    
                        <!-- Delete Order Button -->
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus order ini?')" data-toggle="tooltip" data-placement="top" title="Hapus Order">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between mt-4">
        <div>
            Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} entries
        </div>
        <div>
            {{ $orders->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function () {
        // Tooltip Initialization
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
