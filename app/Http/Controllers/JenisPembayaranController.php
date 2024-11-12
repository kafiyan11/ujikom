<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    public function index()
    {
        // Mengambil data jenis pembayaran yang dikelompokkan berdasarkan name
        $jenisPembayaran = JenisPembayaran::all()->groupBy('name');
        
        return view('admin.jenis_pembayaran.index', compact('jenisPembayaran'));
    }

    public function create()
    {
        return view('admin.jenis_pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'tipe' => 'required|string'
        ]);

        JenisPembayaran::create($request->all());

        return redirect()->route('jenis_pembayaran.index')
                         ->with('success', 'Jenis pembayaran berhasil ditambahkan.');
    }

    public function edit(JenisPembayaran $jenisPembayaran)
    {
        return view('admin.jenis_pembayaran.edit', compact('jenisPembayaran'));
    }

    public function update(Request $request, JenisPembayaran $jenisPembayaran)
    {
        $request->validate([
            'name' => 'required|string',
            'tipe' => 'required|string'
        ]);

        $jenisPembayaran->update($request->all());

        return redirect()->route('jenis_pembayaran.index')
                         ->with('success', 'Jenis pembayaran berhasil diperbarui.');
    }

    public function destroy(JenisPembayaran $jenisPembayaran)
    {
        $jenisPembayaran->delete();

        return redirect()->route('jenis_pembayaran.index')
                         ->with('success', 'Jenis pembayaran berhasil dihapus.');
    }
}
