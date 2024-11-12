<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    // Menampilkan daftar konsumen
    public function index()
    {
        $konsumens = Konsumen::all();
        return view('admin.konsumens.index', compact('konsumens'));
    }

    // Menampilkan form untuk menambah konsumen
    public function create()
    {
        return view('admin.konsumens.create');
    }

    // Menyimpan data konsumen baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:konsumens,email',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        Konsumen::create($request->all());

        return redirect()->route('konsumens.index')->with('success', 'Konsumen berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit konsumen
    public function edit(Konsumen $konsumen)
    {
        return view('admin.konsumens.edit', compact('konsumen'));
    }

    // Memperbarui data konsumen
    public function update(Request $request, Konsumen $konsumen)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:konsumens,email,' . $konsumen->id,
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $konsumen->update($request->all());

        return redirect()->route('konsumens.index')->with('success', 'Konsumen berhasil diperbarui');
    }

    // Menghapus konsumen
    public function destroy(Konsumen $konsumen)
    {
        $konsumen->delete();

        return redirect()->route('konsumens.index')->with('success', 'Konsumen berhasil dihapus');
    }
}
