<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('penjualanID');  // Kolom primary key penjualan
            $table->date('tanggalpenjualan');  // Tanggal penjualan
            $table->decimal('totalharga', 10, 2);  // Total harga penjualan
            $table->unsignedBigInteger('pelangganID');  // Relasi dengan pelanggan
            $table->timestamps();
    
            // Membuat relasi dengan tabel pelanggan
            $table->foreign('pelangganID')->references('pelangganID')->on('pelanggan')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
    
}
