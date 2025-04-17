<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Produk;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('detailPenjualan.produk', 'pelanggan')->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.create', compact('pelanggans', 'produks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pelangganID'   => 'required|exists:pelanggans,id',
            'produkID'      => 'required|array',
            'produkID.*'    => 'exists:produks,id',
            'jumlahproduk'  => 'required|array',
            'jumlahproduk.*'=> 'integer|min:1',
            'subtotal'      => 'required|array',
            'subtotal.*'    => 'numeric|min:0',
            'uangmasuk'     => 'nullable|numeric|min:0',
            'uangkembalian' => 'nullable|numeric|min:0'
        ]);

        DB::transaction(function () use ($validatedData) {
            $penjualan = Penjualan::create([
                'pelangganID'   => $validatedData['pelangganID'],
                'uangmasuk'     => $validatedData['uangmasuk'] ?? 0,
                'uangkembalian' => $validatedData['uangkembalian'] ?? 0,
            ]);

            foreach ($validatedData['produkID'] as $index => $produkID) {
                DetailPenjualan::create([
                    'penjualanID'  => $penjualan->id,
                    'produkID'     => $produkID,
                    'jumlahproduk' => $validatedData['jumlahproduk'][$index],
                    'subtotal'     => $validatedData['subtotal'][$index],
                ]);
            }
        });

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::with('detailPenjualan')->findOrFail($id);
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.edit', compact('penjualan', 'pelanggans', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pelangganID'   => 'required|exists:pelanggans,id',
            'produkID'      => 'required|array',
            'produkID.*'    => 'exists:produks,id',
            'jumlahproduk'  => 'required|array',
            'jumlahproduk.*'=> 'integer|min:1',
            'subtotal'      => 'required|array',
            'subtotal.*'    => 'numeric|min:0',
            'uangmasuk'     => 'nullable|numeric|min:0',
            'uangkembalian' => 'nullable|numeric|min:0'
        ]);

        DB::transaction(function () use ($validatedData, $id) {
            $penjualan = Penjualan::findOrFail($id);
            $penjualan->update([
                'pelangganID'   => $validatedData['pelangganID'],
                'uangmasuk'     => $validatedData['uangmasuk'] ?? 0,
                'uangkembalian' => $validatedData['uangkembalian'] ?? 0,
            ]);

            $penjualan->detailPenjualan()->delete();
            foreach ($validatedData['produkID'] as $index => $produkID) {
                DetailPenjualan::create([
                    'penjualanID'  => $penjualan->id,
                    'produkID'     => $produkID,
                    'jumlahproduk' => $validatedData['jumlahproduk'][$index],
                    'subtotal'     => $validatedData['subtotal'][$index],
                ]);
            }
        });

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        DB::transaction(function () use ($penjualan) {
            $penjualan->detailPenjualan()->delete();
            $penjualan->delete();
        });

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
