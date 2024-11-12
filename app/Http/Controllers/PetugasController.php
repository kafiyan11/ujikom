<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    // Tampilkan daftar petugas
    public function index()
    {
        $petugas = User::where('role', 'Petugas')->get(); // Filter hanya petugas
        return view('admin.petugass.index', compact('petugas'));
    }

    // Tampilkan form tambah petugas
    public function create()
    {
        return view('admin.petugass.create');
    }

    // Simpan data petugas baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
        ]);

        $plainPassword = $request->password;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($plainPassword),
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'plain_password' => $plainPassword,
            'role' => 'Petugas', // Set role sebagai Petugas
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    // Tampilkan form edit petugas
    public function edit(User $user)
    {
        return view('admin.petugass.edit', compact('user'));
    }

    // Update data petugas
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'alamat' => 'required|string',
            'telepon' => 'required|string',
        ]);

        if ($request->password) {
            $user->password = bcrypt($request->password);
            $user->plain_password = $request->password;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'role' => 'Petugas', // Pastikan role tetap sebagai Petugas
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Data petugas berhasil diupdate');
    }

    // Hapus data petugas
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
