<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {  // Ubah 'produks' menjadi 'produk'
            $table->id();
            $table->string('namaproduk');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
