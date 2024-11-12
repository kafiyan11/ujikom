@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Order</h2>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="konsumen_id">Konsumen</label>
            <select name="konsumen_id" class="form-control" required>
                @foreach($konsumens as $konsumen)
                    <option value="{{ $konsumen->id }}" {{ $order->konsumen_id == $konsumen->id ? 'selected' : '' }}>
                        {{ $konsumen->nama }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="product_id">Produk</label>
            <select name="product_id" class="form-control" id="product_id" required onchange="updateHarga()">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" 
                        data-harga="{{ $product->harga }}" 
                        data-kode="{{ $product->product_code }}"
                        {{ $order->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="product_code">Kode Produk</label>
            <input type="text" class="form-control" id="product_code" name="product_code" value="{{ $order->product_code }}" readonly>
        </div>
    
        <div class="form-group">
            <label for="layanan_id">Layanan</label>
            <select name="layanan_id" class="form-control" id="layanan_id" required onchange="updateHarga()">
                @foreach($layanan as $service)
                    <option value="{{ $service->id }}" 
                        data-harga="{{ $service->harga }}"
                        {{ $order->layanan_id == $service->id ? 'selected' : '' }}>
                        {{ $service->nama_layanan }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="jenis_pembayaran_id">Jenis Pembayaran</label>
            <select name="jenis_pembayaran_id" class="form-control" required>
                @foreach($jenis_pembayaran as $payment)
                    <option value="{{ $payment->id }}" {{ $order->jenis_pembayaran_id == $payment->id ? 'selected' : '' }}>
                        {{ $payment->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="jumlah_order">Jumlah Order</label>
            <input type="number" class="form-control" id="jumlah_order" name="jumlah_order" value="{{ $order->jumlah_order }}" required onchange="calculateTotal()">
        </div>
    
        <div class="form-group">
            <label for="uang_diberikan">Uang Diberikan</label>
            <input type="number" class="form-control" id="uang_diberikan" name="uang_diberikan" value="{{ $order->uang_diberikan }}" required onchange="calculateKembalian()">
        </div>
    
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="number" class="form-control" id="total_harga" name="total_harga" value="{{ $order->total_harga }}" readonly>
        </div>
    
        <div class="form-group">
            <label for="uang_kembalian">Uang Kembalian</label>
            <input type="number" class="form-control" id="uang_kembalian" name="uang_kembalian" value="{{ $order->uang_kembalian }}" readonly>
        </div>

        <!-- Bagian Persetujuan Pembayaran Admin -->
        <div class="form-group">
            <label for="is_approved">Persetujuan Pembayaran</label><br>
            <input type="checkbox" name="is_approved" id="is_approved" value="1" {{ $order->is_approved ? 'checked' : '' }}>
            <label for="is_approved">Sudah Disetujui</label>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    // Update product kode and price
    function updateHarga() {
        var productSelect = document.getElementById('product_id');
        var selectedProduct = productSelect.options[productSelect.selectedIndex];
        document.getElementById('product_code').value = selectedProduct.getAttribute('data-kode');

        calculateTotal();
    }

    // Calculate total price
    function calculateTotal() {
        var productSelect = document.getElementById('product_id');
        var selectedProduct = productSelect.options[productSelect.selectedIndex];
        var productPrice = parseFloat(selectedProduct.getAttribute('data-harga'));

        var layananSelect = document.getElementById('layanan_id');
        var selectedLayanan = layananSelect.options[layananSelect.selectedIndex];
        var layananPrice = parseFloat(selectedLayanan.getAttribute('data-harga'));

        var jumlahOrder = parseInt(document.getElementById('jumlah_order').value);

        var totalPrice = (productPrice + layananPrice) * jumlahOrder;

        document.getElementById('total_harga').value = totalPrice;

        calculateKembalian();
    }

    // Calculate uang kembalian
    function calculateKembalian() {
        var uangDiberikan = parseFloat(document.getElementById('uang_diberikan').value);
        var totalHarga = parseFloat(document.getElementById('total_harga').value);

        if (!isNaN(uangDiberikan) && !isNaN(totalHarga)) {
            var uangKembalian = uangDiberikan - totalHarga;
            document.getElementById('uang_kembalian').value = uangKembalian;
        }
    }
</script>
@endsection
