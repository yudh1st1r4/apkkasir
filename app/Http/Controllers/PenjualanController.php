<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $penjualan = Penjualan::with('pelanggan');
    
        if ($request->has('search')) {
            $penjualan->whereDate('tanggalpenjualan', $request->search);
        }
    
        $penjualan = $penjualan->get();
    
        return view('penjualan.index', compact('penjualan'));
    }
    

    public function create()
    {
        // Menampilkan form untuk menambah penjualan baru
        $pelanggan = Pelanggan::all();  // Menampilkan semua pelanggan
        return view('penjualan.create', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        // Menyimpan penjualan baru
        $request->validate([
            'tanggalpenjualan' => 'required|date',
            'totalharga' => 'required|numeric',
            'pelangganID' => 'required|exists:pelanggan,pelangganID',
        ]);

        Penjualan::create($request->all());
        return redirect()->route('penjualan.index');
    }

    public function show($id)
    {
        // Menampilkan detail penjualan
        $penjualan = Penjualan::where('penjualanID', $id)->firstOrFail();
        return view('penjualan.show', compact('penjualan'));
    }

    public function edit($id)
    {
        // Menampilkan form untuk edit penjualan
        $penjualan = Penjualan::where('penjualanID', $id)->firstOrFail();

        $pelanggan = Pelanggan::all();
        return view('penjualan.edit', compact('penjualan', 'pelanggan'));
    }

    public function update(Request $request, $id)
    {
        // Mengupdate penjualan
        $request->validate([
            'tanggalpenjualan' => 'required|date',
            'totalharga' => 'required|numeric',
            'pelangganID' => 'required|exists:pelanggan,pelangganID',
        ]);

        $penjualan = Penjualan::where('penjualanID', $id)->firstOrFail();

        $penjualan->update($request->all());
        return redirect()->route('penjualan.index');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::where('penjualanID', $id)->firstOrFail();
        // Ensure you're using the correct column here
        $penjualan->delete();
    
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus');
    }
    
}

