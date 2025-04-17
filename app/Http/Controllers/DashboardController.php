<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    $produk = Produk::all();

    $pelanggan = Pelanggan::select('pelanggan.*')
        ->selectSub(function ($query) {
            $query->selectRaw('SUM(subtotal)')
                  ->from('penjualan')
                  ->whereColumn('penjualan.pelanggan_id', 'pelanggan.id');
        }, 'total_pengeluaran')
        ->orderByDesc('total_pengeluaran')
        ->get();

    $totalProduk = Produk::count();
    $totalPenjualan = Penjualan::count();
    $totalUangMasuk = Penjualan::sum('uangmasuk');
    $totalUangKeluar = Penjualan::sum('subtotal');
    $totalPelanggan = Pelanggan::count(); // ← ini ditambahkan

    $filter = $request->query('filter', 'monthly');

    if ($filter === 'monthly') {
        $penjualan = Penjualan::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as periode, COUNT(id) as total')
            ->groupBy('periode')
            ->orderBy('periode')
            ->get();
    } else {
        $penjualan = Penjualan::selectRaw('YEAR(created_at) as periode, COUNT(id) as total')
            ->groupBy('periode')
            ->orderBy('periode')
            ->get();
    }

    return view('dashboard', compact(
        'produk', 
        'pelanggan',
        'totalProduk',
        'totalPenjualan',
        'totalUangMasuk',
        'totalUangKeluar',
        'totalPelanggan', // ← ini juga dimasukkan ke compact
        'penjualan',
        'filter'
    ));
}

public function kasirIndex()
{
    $totalTransaksi = Penjualan::count();
    $totalPendapatan = (float) Penjualan::sum('subtotal');
    $penjualanHariIni = Penjualan::whereDate('created_at', today())->count();
    $riwayatTransaksi = Penjualan::latest()->take(5)->get();
    
    // Tambahkan ini untuk totalUangMasuk
    $totalUangMasuk = Penjualan::sum('uangmasuk');
    
    return view('home', compact(
        'totalTransaksi',
        'totalPendapatan',
        'penjualanHariIni',
        'riwayatTransaksi',
        'totalUangMasuk'  // Pastikan ini juga ada di compact
    ));
}

    


}
