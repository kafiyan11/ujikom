@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Order</h2>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="konsumen_id">Konsumen</label>
            <select name="konsumen_id" class="form-control" required>
                <option value="" selected disabled>--- Pilih Konsumen ---</option>
                @foreach($konsumens as $konsumen)
                    <option value="{{ $konsumen->id }}">{{ $konsumen->nama }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="product_id">Produk</label>
            <select name="product_id" class="form-control" id="product_id" required onchange="updateProductDetails()">
                <option value="" selected disabled>--- Pilih Produk ---</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-harga="{{ $product->harga }}" data-kode="{{ $product->product_code }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="product_code">Kode Produk</label>
            <input type="text" class="form-control" id="product_code" name="product_code" readonly>
        </div>
    
        <div class="form-group">
            <label for="layanan_id">Layanan</label>
            <select name="layanan_id" class="form-control" id="layanan_id" required onchange="calculateTotal()">
                <option value="" selected disabled>--- Pilih Layanan ---</option>
                @foreach($layanan as $service)
                    <option value="{{ $service->id }}" data-harga="{{ $service->harga }}">{{ $service->nama_layanan }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="jenis_pembayaran_id">Jenis Pembayaran</label>
            <select name="jenis_pembayaran_id" class="form-control" id="jenis_pembayaran_id" required onchange="updatePaymentType()">
                <option value="" selected disabled>--- Pilih Jenis Pembayaran ---</option>
                @foreach($jenis_pembayaran as $payment)
                    <option value="{{ $payment->id }}" data-tipe="{{ $payment->tipe }}">{{ $payment->name }} ({{ $payment->tipe }})</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group row">
            <div class="col-md-6">
                <label for="jumlah_order">Jumlah Order</label>
                <input type="number" class="form-control" id="jumlah_order" name="jumlah_order" value="1" required onchange="calculateTotal()">
            </div>
            <div class="col-md-6">
                <label for="uang_diberikan">Uang Diberikan</label>
                <input type="number" class="form-control" id="uang_diberikan" name="uang_diberikan" required onchange="calculateChange()">
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-md-6">
                <label for="total_harga">Total Harga</label>
                <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
            </div>
            <div class="col-md-6">
                <label for="uang_kembalian">Uang Kembalian</label>
                <input type="number" class="form-control" id="uang_kembalian" name="uang_kembalian" readonly>
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('orders.index') }}" class="btn btn-primary">Kembali</a>
    </form>
</div>

<script>
    function updateProductDetails() {
        const productSelect = document.getElementById('product_id');
        const selectedProduct = productSelect.options[productSelect.selectedIndex];
        
        document.getElementById('product_code').value = selectedProduct.getAttribute('data-kode');
        calculateTotal();
    }

    function calculateTotal() {
        const productSelect = document.getElementById('product_id');
        const layananSelect = document.getElementById('layanan_id');
        
        const selectedProduct = productSelect.options[productSelect.selectedIndex];
        const selectedLayanan = layananSelect.options[layananSelect.selectedIndex];
        
        const productPrice = parseFloat(selectedProduct.getAttribute('data-harga') || 0);
        const layananPrice = parseFloat(selectedLayanan.getAttribute('data-harga') || 0);
        const jumlahOrder = parseInt(document.getElementById('jumlah_order').value) || 1;

        const totalPrice = (productPrice + layananPrice) * jumlahOrder;
        document.getElementById('total_harga').value = totalPrice;

        calculateChange();
    }

    function calculateChange() {
        const uangDiberikan = parseFloat(document.getElementById('uang_diberikan').value) || 0;
        const totalHarga = parseFloat(document.getElementById('total_harga').value) || 0;
        
        const uangKembalian = uangDiberikan - totalHarga;
        document.getElementById('uang_kembalian').value = uangKembalian >= 0 ? uangKembalian : 0;
    }
</script>
@endsection
