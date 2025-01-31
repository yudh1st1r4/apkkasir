<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';  // Menentukan nama tabel

    protected $primaryKey = 'penjualanID'; // jika primary key-nya bukan 'id'


    protected $fillable = [
        'tanggalpenjualan',
        'totalharga',
        'pelangganID',
    ];

    // Relasi dengan model Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelangganID', 'pelangganID');
    }
    

}


