<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualan';
    protected $fillable = [
        'penjualanID',
        'namaproduk',
        'jumlahproduk',
        'subtotal',
        'uangmasuk',
        'uangkeluar',
    ];

    // Relasi dengan Produk
  // In DetailPenjualan Model
  public function penjualan()
  {
      return $this->belongsTo(Penjualan::class);
  }
  
  public function produk()
  {
      return $this->belongsTo(Produk::class);
  }  

}

