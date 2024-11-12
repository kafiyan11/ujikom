<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'product_code', 'harga'];

    protected static function boot()
    {
        parent::boot();

        // Membuat kode produk otomatis sebelum menyimpan produk baru
        static::creating(function ($product) {
            $product->product_code = 'PRD-' . strtoupper(Str::random(6));
        });
    }
}
