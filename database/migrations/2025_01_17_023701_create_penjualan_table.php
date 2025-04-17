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
            $table->id();
            $table->date('tanggalpenjualan');
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('produk_id');
            $table->integer('jumlahproduk');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('uangmasuk', 10, 2)->default(0.00);
            $table->decimal('uangkeluar', 10, 2)->default(0.00);
            //$table->string('metode_pembayaran')->after('uangkeluar');
            $table->timestamps();

            // Foreign keys
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
