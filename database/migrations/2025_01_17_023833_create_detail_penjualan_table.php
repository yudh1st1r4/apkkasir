<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     * 
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id('detailID');
            $table->foreignId('penjualanID')->constrained('penjualan')->cascadeOnDelete();;
            $table->foreignId('produkID')->constrained('produk');
            $table->integer('jumlahproduk');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            // definisi kolom
        });
        
    }
}
