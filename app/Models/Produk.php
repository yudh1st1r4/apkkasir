<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Specify the table name (if it's different from the default 'produks')
    protected $table = 'produk';  // Use 'produk' if your table name is singular.

    // Specify the primary key name
    protected $primaryKey = 'produkID';  // Your primary key column
    protected $fillable = [
        'namaproduk',
        'harga',
        'deskripsi',
        'gambar',
    ];
    // If the primary key is not auto-incrementing (e.g., UUID), set this property to false
    public $incrementing = true;  // Set to 'false' if your key is not auto-incrementing

    // If the primary key is not an integer, specify the key type (e.g., 'string' for UUIDs)
    protected $keyType = 'int';  // Set to 'string' if your primary key is not an integer
}
