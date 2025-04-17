<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    // Menampilkan form untuk membuat pelanggan baru
    public function create()
    {
        return view('pelanggan.create', ['pelanggan' => new Pelanggan()]);
    }

    // Menyimpan pelanggan baru
    public function store(Request $request)
{
    //dd($request->all()); // Cek apakah nomortelepon ada dalam request

    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'nomortelepon' => 'required|string|max:15',
    ]);
    

    Pelanggan::create($validatedData);

    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
}

    // Menampilkan form edit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    // Memperbarui data pelanggan
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|unique:pelanggans,email,' . $id,
            'nomortelepon' => 'required|string|max:15',
        ]);

        $pelanggan->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomortelepon' => $request->nomortelepon,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    // Menghapus pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }

    // Menampilkan detail pelanggan
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }
}
