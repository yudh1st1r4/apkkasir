<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('pelangganID');  // Menentukan kolom primary key
            $table->string('nama');
            $table->text('alamat');
            $table->string('nomortelepon');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
    

}
