<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Mengubah nama kolom kode_produk menjadi product_code
            $table->renameColumn('kode_produk', 'product_code');
        });
    }
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Membalikkan perubahan jika rollback dilakukan
            $table->renameColumn('product_code', 'kode_produk');
        });
    }
};
