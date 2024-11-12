<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Layanan;
use App\Models\Product;
use App\Models\Konsumen;
use App\Models\JenisPembayaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class OrderController extends Controller
{
    // Menampilkan semua order
    public function index()
    {
        // Ambil semua data order
        $orders = Order::paginate(10); // 10 orders per page
        // Kirim data order ke view
        return view('admin.orders.index', compact('orders'));
    }
    // Menampilkan form untuk membuat order baru
    public function create()
    {
        $products = Product::all();
        $layanan = Layanan::all();
        $konsumens = Konsumen::all();
        $jenis_pembayaran = JenisPembayaran::all();
        
        // Ambil kategori unik (name) dari jenis pembayaran
        $kategoris = $jenis_pembayaran->pluck('name')->unique();
    
        return view('admin.orders.create', compact('products', 'layanan', 'konsumens', 'jenis_pembayaran', 'kategoris'));
    }
    

    // Menyimpan data order
    public function store(Request $request)
    {
        // Validate the inputs
        $validated = $request->validate([
            'konsumen_id' => 'required|exists:konsumens,id',
            'product_id' => 'required|exists:products,id',
            'layanan_id' => 'required|exists:layanan,id',
            'jenis_pembayaran_id' => 'required|exists:jenis_pembayaran,id',
            'jumlah_order' => 'required|numeric|min:1',
            'uang_diberikan' => 'required|numeric|min:0',
        ]);
    
        // Get the product and layanan
        $product = Product::find($request->product_id);
        $layanan = Layanan::find($request->layanan_id);
    
        // Ensure 'product_code' is available from the selected product
        if (!$product || !$product->product_code) {
            return redirect()->back()->with('error', 'Product code not found!');
        }
    
        // Calculate total price
        $totalHarga = ($product->harga + $layanan->harga) * $request->jumlah_order;
        $uangKembalian = $request->uang_diberikan - $totalHarga;
    
        // Store the order
        $order = Order::create([
            'konsumen_id' => $request->konsumen_id,
            'product_id' => $request->product_id,
            'layanan_id' => $request->layanan_id,
            'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
            'jumlah_order' => $request->jumlah_order,
            'total_harga' => $totalHarga,
            'uang_diberikan' => $request->uang_diberikan,
            'uang_kembalian' => $uangKembalian,
            'product_code' => $product->product_code,  // Changed to product_code
        ]);
    
        return redirect()->route('orders.index')->with('success', 'Order successfully added!');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $konsumens = Konsumen::all();
        $products = Product::all();
        $layanan = Layanan::all();
        $jenis_pembayaran = JenisPembayaran::all();
    
        return view('admin.orders.edit', compact('order', 'konsumens', 'products', 'layanan', 'jenis_pembayaran'));
    }

    // Memperbarui data order
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'konsumen_id' => 'required',
            'product_id' => 'required',
            'product_code' => 'required',
            'layanan_id' => 'required',
            'jenis_pembayaran_id' => 'required',
            'jumlah_order' => 'required|integer|min:1',
            'uang_diberikan' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric',
            'uang_kembalian' => 'required|numeric',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }
    public function generatePDF()
    {
        $orders = Order::with(['konsumen', 'product', 'layanan', 'jenisPembayaran'])->get();

        $pdf = PDF::loadView('admin.orders.pdf', compact('orders'));

        return $pdf->download('laporan_orderan.pdf');
    }
    // Menghapus order
    public function destroy(Order $order)
    {
        // Hapus order
        $order->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus!');
    }
}
