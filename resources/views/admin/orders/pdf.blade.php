<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Orderan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .table-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="table-title">
        <h2>Laporan Orderan</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Konsumen</th>
                <th>Produk</th>
                <th>Layanan</th>
                <th>Jenis Pembayaran</th>
                <th>Jumlah Order</th>
                <th>Total Harga</th>
                <th>Uang Diberikan</th>
                <th>Uang Kembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->konsumen->nama }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->layanan->nama_layanan }}</td>
                <td>{{ $order->jenisPembayaran->name }}</td>
                <td>{{ $order->jumlah_order }}</td>
                <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($order->uang_diberikan, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($order->uang_kembalian, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
