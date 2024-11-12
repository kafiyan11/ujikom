<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsumen_id')->constrained('konsumens');
            $table->foreignId('product_id')->constrained('products');
            $table->string('kode_produk');
            $table->foreignId('layanan_id')->constrained('layanan');
            $table->foreignId('jenis_pembayaran_id')->constrained('jenis_pembayaran');
            $table->integer('jumlah_order');
            $table->decimal('total_harga', 15, 2);
            $table->decimal('uang_diberikan', 15, 2);
            $table->decimal('uang_kembalian', 15, 2);
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
