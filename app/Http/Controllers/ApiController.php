<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function getPelanggan()
    {
        $pelanggan = Pelanggan::withSum('penjualan', 'subtotal')
            ->orderByDesc('penjualan_sum_subtotal')
            ->get(['id', 'nama']);

        return response()->json([
            'pelanggan' => $pelanggan
        ]);
    }

    public function getPenjualan(Request $request)
    {
        $filter = $request->query('filter', 'monthly');
        
        $penjualan = Penjualan::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as periode, SUM(subtotal) as total')
            ->groupBy('periode')
            ->orderBy('periode', 'asc');

        if ($filter === 'yearly') {
            $penjualan->selectRaw('DATE_FORMAT(created_at, "%Y") as periode')
                ->groupBy('periode');
        }

        $data = $penjualan->get();

        return response()->json([
            'labels' => $data->pluck('periode'),
            'sales' => $data->pluck('total')
        ]);
    }
}
