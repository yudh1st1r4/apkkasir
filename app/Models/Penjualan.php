<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id'; // Pastikan ini sesuai

    protected $fillable = [
        'tanggalpenjualan',
        'pelanggan_id',
        'produk_id',
        'jumlahproduk',
        'subtotal',
        'uangmasuk',
        'uangkeluar',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id'); // Sesuaikan ke primary key 'id'
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}


