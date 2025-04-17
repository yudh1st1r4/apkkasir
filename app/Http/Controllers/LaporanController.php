<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    /**
     * Show the sales report grouped by month and year.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $bulan = $request->bulan;
        $date = $request->date;  // Menangkap parameter tanggal

        // Filter penjualan berdasarkan bulan dan tanggal
        $penjualan = Penjualan::when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tanggalpenjualan', $bulan);
            })
            ->when($date, function ($query, $date) {
                return $query->whereDate('tanggalpenjualan', $date);  // Memfilter berdasarkan tanggal
            })
            ->get();

        return view('laporan.index', compact('penjualan'));
    }

    /**
     * Generate and download the sales report as a PDF.
     *
     * @return \Barryvdh\DomPDF\Facade
     */
    public function printPDF(Request $request)
    {
        $bulan = $request->bulan;
        $date = $request->date;

        // Ambil data penjualan yang sudah difilter berdasarkan bulan dan tanggal
        $penjualan = Penjualan::when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tanggalpenjualan', $bulan);
            })
            ->when($date, function ($query, $date) {
                return $query->whereDate('tanggalpenjualan', $date);  // Memfilter berdasarkan tanggal
            })
            ->get();

        // Generate PDF menggunakan view 'laporan.pdf' dengan data penjualan
        $pdf = PDF::loadView('laporan.pdf', compact('penjualan'));

        // Return PDF sebagai file download
        return $pdf->download('laporan-penjualan.pdf');
    }
}
