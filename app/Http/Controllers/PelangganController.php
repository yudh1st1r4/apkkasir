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
        // Mengirim data kosong agar tidak terjadi error
        return view('pelanggan.create', ['pelanggan' => new Pelanggan()]);
    }

    // Menyimpan pelanggan baru
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'nomortelepon' => 'required|string|max:15',
    ]);

    // Ensure 'nama' is in the request before proceeding
    if (!$request->has('nama')) {
        return redirect()->back()->withErrors('Nama is required');
    }

    Pelanggan::create($request->all());

    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
}

   // In your controller method
public function edit($id)
{
    $pelanggan = Pelanggan::findOrFail($id);  // Find the customer by ID
    return view('pelanggan.edit', compact('pelanggan'));  // Pass the pelanggan to the view
}
public function update(Request $request, $id)
{
    // Validate the input data
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string', // Ensure alamat is required
        'nomortelepon' => 'required|string|max:15',
    ]);

    // Find the pelanggan by ID and update the data
    $pelanggan = Pelanggan::findOrFail($id);
    $pelanggan->update($request->all());

    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui');
}

    // Menghapus pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus');
    }
}
