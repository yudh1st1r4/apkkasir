<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdukToPenjualanTable extends Migration
{public function up()
{
    Schema::table('penjualan', function (Blueprint $table) {
        $table->json('produk')->nullable();  // Adding 'produk' column as JSON
    });
}

public function down()
{
    Schema::table('penjualan', function (Blueprint $table) {
        $table->dropColumn('produk');  // Dropping 'produk' column
    });
}

}
