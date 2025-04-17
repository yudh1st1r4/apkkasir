<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with(['pelanggan'])->get(); 
        return view('penjualan.index', compact('penjualan'));
    }
    
    public function create()
    {
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.create', compact('pelanggans', 'produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggalpenjualan' => 'required|date',
            'pelanggan_id'      => 'required|exists:pelanggan,id',
            'produk_id'         => 'required|array',
            'produk_id.*'       => 'exists:produk,id',
            'jumlahproduk'      => 'required|array',
            'jumlahproduk.*'    => 'integer|min:1',
            'subtotal'          => 'required|array',
            'subtotal.*'        => 'numeric',
            'uangmasuk'         => 'required|numeric',
            'uangkeluar'        => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ]);
    
        foreach ($request->produk_id as $index => $produkId) {
            $produk = Produk::findOrFail($produkId);
            $jumlah = $request->jumlahproduk[$index];
    
            if ($produk->stock < $jumlah) {
                return redirect()->back()->with('error', "Stok produk $produk->nama tidak mencukupi!");
            }
    
            $produk->stock -= $jumlah;
            $produk->save();
        }

        // Generate kode transaksi otomatis
        $lastTransaction = Penjualan::latest()->first();
        $number = $lastTransaction ? ((int)substr($lastTransaction->kodetransaksi, -3)) + 1 : 1;
        $kodeTransaksi = 'TRX-' . date('Ymd') . '-' . str_pad($number, 3, '0', STR_PAD_LEFT);
    
        Penjualan::create([
            'kodetransaksi'   => $kodeTransaksi,
            'tanggalpenjualan' => $request->tanggalpenjualan,
            'pelanggan_id'     => $request->pelanggan_id,
            'produk_id'        => json_encode($request->produk_id, JSON_NUMERIC_CHECK),
            'jumlahproduk'     => json_encode($request->jumlahproduk, JSON_NUMERIC_CHECK),
            'subtotal'         => json_encode($request->subtotal, JSON_NUMERIC_CHECK),
            'uangmasuk'        => $request->uangmasuk,
            'uangkeluar'       => $request->uangkeluar,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);
    
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $penjualan = Penjualan::with('pelanggan')->findOrFail($id);
        $produk_id = json_decode($penjualan->produk_id, true);
        $jumlahproduk = json_decode($penjualan->jumlahproduk, true);
        $subtotal = json_decode($penjualan->subtotal, true);
        
        $produks = Produk::whereIn('id', $produk_id)->get();
        $produk_list = [];
        foreach ($produks as $index => $produk) {
            $produk_list[] = (object) [
                'namaproduk' => $produk->namaproduk,
                'harga' => $produk->harga,
                'jumlah' => $jumlahproduk[$index] ?? 1,
                'subtotal' => $subtotal[$index] ?? 0
            ];
        }
    
        return view('penjualan.show', compact('penjualan', 'produk_list'));
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Data berhasil dihapus!');
    }

    public function downloadStruk($id)
    {
        $penjualan = Penjualan::with('pelanggan')->findOrFail($id);
        $produk_id = json_decode($penjualan->produk_id, true);
        $jumlahproduk = json_decode($penjualan->jumlahproduk, true);
        $subtotal = json_decode($penjualan->subtotal, true);
        
        $produks = Produk::whereIn('id', $produk_id)->get();
        
        $total = array_sum($subtotal);
        $ppn = $total * 0.10;
        $kembalian = $penjualan->uangmasuk - $total - $ppn;
    
        $pdf = Pdf::loadView('penjualan.show', compact('penjualan', 'produk_id', 'jumlahproduk', 'subtotal', 'produks', 'total', 'ppn', 'kembalian'));
        return $pdf->download('struk_penjualan_' . $penjualan->kodetransaksi . '.pdf');
    }
}


