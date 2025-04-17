<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');              // Masih pakai string, cocok untuk teks
            $table->text('alamat');              // Ganti jadi text, lebih cocok untuk alamat panjang
            $table->integer('nomortelepon');     // Ganti dari string ke integer
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
