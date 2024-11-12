<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('plain_password')->nullable(); // simpan password asli (hati-hati untuk keamanan)
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['alamat', 'telepon', 'plain_password']);
        });
    }
    
};
