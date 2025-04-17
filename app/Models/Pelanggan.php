<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id'; // Default primary key Laravel
    public $timestamps = false;
    
        protected $fillable = ['nama', 'alamat', 'nomortelepon'];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'pelanggan_id', 'id'); 
    }
}

