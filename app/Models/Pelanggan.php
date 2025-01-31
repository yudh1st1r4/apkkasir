<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Tentukan nama tabel sesuai dengan yang ada di database
    protected $table = 'pelanggan';  // Pastikan ini sesuai dengan nama tabel di database Anda

    protected $primaryKey = 'pelangganID';  // Jika primary key Anda berbeda, pastikan ditentukan dengan benar

    protected $fillable = [
        'nama', 
        'alamat', 
        'nomortelepon',
    ];
}

