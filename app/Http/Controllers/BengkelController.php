<?php

namespace App\Http\Controllers;

use App\Models\BengkelMaintenance;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    public function index()
    {
        $bengkels = BengkelMaintenance::orderBy('id_bengkel', 'asc')->get();

        return view('bengkel.index', compact('bengkels'));
    }

    public function create()
    {
        return view('bengkel.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_bengkel' => 'required|string|max:100',
            'lokasi' => 'required|string',
            'kontak' => 'required|string|max:20',
            'jenis_layanan' => 'required|string|max:100',
        ]);

        BengkelMaintenance::create($data);

        return redirect()
            ->route('bengkel.index')
            ->with('success', 'Data bengkel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $bengkel = BengkelMaintenance::findOrFail($id);

         return view('bengkel.edit', compact('bengkel'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_bengkel' => 'required|string|max:100',
            'lokasi' => 'required|string',
            'kontak' => 'required|string|max:20',
            'jenis_layanan' => 'required|string|max:100',
        ]);

        $bengkel = BengkelMaintenance::findOrFail($id);
        $bengkel->update($data);

        return redirect()
            ->route('bengkel.index')
            ->with('success', 'Data bengkel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bengkel = BengkelMaintenance::findOrFail($id);
        $bengkel->delete();

        return redirect()
            ->route('bengkel.index')
            ->with('success', 'Data bengkel berhasil dihapus.');
    }
}
