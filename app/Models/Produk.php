<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';  
    protected $primaryKey = 'id'; // Sesuai dengan database

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['namaproduk', 'harga', 'stock', 'gambar']; // Tambahkan ini

    // Mengubah relasi menjadi belongsToMany untuk menangani many-to-many
    public function penjualan()
    {
        return $this->belongsToMany(Penjualan::class, 'penjualan_produk', 'produk_id', 'penjualan_id')
                    ->withPivot('jumlahproduk'); // Menambahkan kolom jumlah produk di tabel pivot
    }
}
