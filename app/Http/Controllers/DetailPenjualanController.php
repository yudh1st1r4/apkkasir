<?php  

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Pelanggan;  //Tambahkan baris ini untuk mengimport model Pelanggan
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function index()
    {
        $detailPenjualan = DetailPenjualan::with(['penjualan', 'produk'])->get();
        
        return view('detailpenjualan.index', compact('detailPenjualan'));
    }

    // Di controller untuk menampilkan form create
    public function create()
{
    $penjualan = Penjualan::all(); 
    $produks = Produk::all();
    return view('detailpenjualan.create', compact('penjualan', 'produks'));
}

public function store(Request $request)
{
    $request->validate([
        'penjualanID' => 'required|exists:penjualan,penjualanID',
        'produkID' => 'required|exists:produk,produkID',
        'jumlahproduk' => 'required|integer|min:1',
        'subtotal' => 'required|numeric'
    ]);

    try {
        DetailPenjualan::create([
            'penjualanID' => $request->penjualanID,
            'produkID' => $request->produkID,
            'jumlahproduk' => $request->jumlahproduk,
            'subtotal' => $request->subtotal
        ]);

        return redirect()->route('detailpenjualan.index')->with('success', 'Data berhasil disimpan!');
    } catch (\Exception $e) {
        return redirect()->route('detailpenjualan.create')->with('error', 'Error: ' . $e->getMessage());
    }
}


    public function show($id)
    {
        $detail = DetailPenjualan::findOrFail($id);
        return view('detailpenjualan.show', compact('detail'));
    }

    public function edit($id)
    {
        $detail = DetailPenjualan::findOrFail($id);
        $penjualan = Penjualan::all();
        $produks = Produk::all();
        return view('detailpenjualan.edit', compact('detail', 'penjualan', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'penjualanID' => 'required|exists:penjualan,penjualanID',
            'produkID' => 'required|exists:produk,produkID',
            'jumlahproduk' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $detail = DetailPenjualan::findOrFail($id);
        $detail->update($validated);

        return redirect()->route('detailpenjualan.index')->with('success', 'Detail Penjualan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $detail = DetailPenjualan::findOrFail($id);
        $detail->delete();

        return redirect()->route('detailpenjualan.index')->with('success', 'Detail Penjualan berhasil dihapus');
    }
}
