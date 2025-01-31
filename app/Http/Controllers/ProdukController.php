<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $produks = Produk::all(); // Mengambil semua data produk
        return view('produk.index', compact('produks')); // Menampilkan view produk.index
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('produk.create'); // Menampilkan form create
    }

    // Menyimpan produk baru
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'namaproduk' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

    // Create a new Produk record in the database
    Produk::create([
        'namaproduk' => $validatedData['namaproduk'],
        'deskripsi' => $validatedData['deskripsi'],
        'harga' => $validatedData['harga'],
        'stock' => $validatedData['stock'],
    ]);

    // Redirect to a page with a success message
    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
}

    // Menampilkan detail produk
    public function show($id)
    {
        $produk = Produk::findOrFail($id); // Mencari produk berdasarkan ID
        return view('produk.show', compact('produk')); // Menampilkan view produk.show
    }

    public function edit($produkID)
    {
        // Find the product by its ID
        $produk = Produk::findOrFail($produkID);
        
        // Return the edit view with the existing product data
        return view('produk.edit', compact('produk'));
    }
    

    // Mengupdate data produk
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'namaproduk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $produk = Produk::findOrFail($id); // Mencari produk berdasarkan ID

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar) {
                Storage::delete($produk->gambar);
            }
            // Menyimpan gambar baru
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('public/images');
            $produk->gambar = $gambarPath; // Simpan path gambar baru
        }

        // Mengupdate data produk
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id); // Mencari produk berdasarkan ID

        // Hapus gambar jika ada
        if ($produk->gambar) {
            Storage::delete($produk->gambar);
        }

        // Menghapus produk dari database
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
