<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'konsumen_id',
        'product_id',
        'product_code',
        'layanan_id',
        'jenis_pembayaran_id',
        'jumlah_order',
        'total_harga',
        'uang_diberikan',
        'uang_kembalian',
    ];

    // Relasi ke tabel Konsumens
    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    // Relasi ke tabel Products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke tabel Layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    // Relasi ke tabel JenisPembayaran
    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class);
    }
}
