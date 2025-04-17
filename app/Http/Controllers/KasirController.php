<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.dashboard'); // Pastikan file ini ada di resources/views/kasir/
    }

    public function transaksi()
    {
        return view('kasir.transaksi'); // Pastikan file ini ada di resources/views/kasir/
    }

    public function pelanggan()
    {
        return view('kasir.pelanggan'); // Pastikan file ini ada di resources/views/kasir/
    }
}
