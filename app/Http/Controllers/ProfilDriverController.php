<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilDriver;

class ProfilDriverController extends Controller
{
    // 1. INDEX (Read): Menampilkan semua data driver
    public function index()
    {
        $drivers = ProfilDriver::all();
        return view('profil_driver.index', compact('drivers'));
    }

    // 2. SHOW (Detail): Menampilkan satu data spesifik
    public function show(string $id)
    {
        $driver = ProfilDriver::findOrFail($id);
        return view('profil_driver.show', compact('driver'));
    }

    // 3. CREATE: Menampilkan form tambah data
    public function create()
    {
        return view('profil_driver.create');
    }

    // 4. STORE: Proses menyimpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'nomor_sim' => 'required|string|max:50',
            'status'    => 'required|string',
            'kontak'    => 'required|string|max:20',
        ]);

        ProfilDriver::create([
            'nama'      => $request->nama,
            'nomor_sim' => $request->nomor_sim,
            'status'    => $request->status,
            'kontak'    => $request->kontak,
        ]);

        return redirect()->route('profil_driver.index')
            ->with('success', 'Data driver berhasil ditambahkan!');
    }

    // 5. EDIT: Menampilkan form edit yang sudah ada isinya
    public function edit(string $id)
    {
        $driver = ProfilDriver::findOrFail($id);
        return view('profil_driver.edit', compact('driver'));
    }

    // 6. UPDATE: Proses menyimpan data yang sudah diedit
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'nomor_sim' => 'required|string|max:50',
            'status'    => 'required|string',
            'kontak'    => 'required|string|max:20',
        ]);

        $driver = ProfilDriver::findOrFail($id);
        $driver->update([
            'nama'      => $request->nama,
            'nomor_sim' => $request->nomor_sim,
            'status'    => $request->status,
            'kontak'    => $request->kontak,
        ]);

        return redirect()->route('profil_driver.index')
            ->with('success', 'Data driver berhasil diperbarui!');
    }

    // 7. DESTROY (Delete): Proses menghapus data
    public function destroy(string $id)
    {
        $driver = ProfilDriver::findOrFail($id);
        $driver->delete();

        return redirect()->route('profil_driver.index')
            ->with('success', 'Data driver berhasil dihapus!');
    }
}