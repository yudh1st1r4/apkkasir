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
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('produk.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaproduk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namagambar = time().'_'.$gambar->getClientOriginalName();
            $path = $gambar->storeAs('image', $namagambar, 'public'); // Simpan ke storage/public/image
            $validatedData['gambar'] = $path; // Simpan path gambar ke database
        }

        // Simpan ke database
        Produk::create($validatedData);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // Mengupdate data produk
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namaproduk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        // Jika ada gambar baru, hapus yang lama dan simpan yang baru
        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $gambar = $request->file('gambar');
            $namagambar = time().'_'.$gambar->getClientOriginalName();
            $path = $gambar->storeAs('image', $namagambar, 'public');
            $validatedData['gambar'] = $path;
        }

        // Update produk
        $produk->update($validatedData);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus gambar jika ada
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        // Hapus produk dari database
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
