<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjualanTable extends Migration
{
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id(); // Laravel otomatis membuat big integer unsigned
            $table->foreignId('penjualanID')->constrained('penjualan')->cascadeOnDelete();
            $table->string('namaproduk');
            $table->integer('jumlahproduk');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('uangmasuk', 10, 2)->default(0);
            $table->foreignId('pelangganID')->constrained('pelanggan')->cascadeOnDelete();
            $table->decimal('uangkeluar', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_penjualan');
    }
}
