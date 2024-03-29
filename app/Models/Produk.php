<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'gambar',
        'harga',
        'harga_promo',
        'tanggal_promo_berakhir'
    ];

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}