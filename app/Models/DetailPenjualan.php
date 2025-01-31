<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    
    protected $table = 'detail_penjualan';
    
    protected $fillable = [
        'detailId',
        'penjualanID',
        'produkID',        
        'jumlahproduk',
        'subtotal',

    ];

    // Definisikan relasi dengan model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produkID');
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualanID');
    }

    
}


    

