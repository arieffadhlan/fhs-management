<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_masuk',
        'nama_barang',
        'kategori_barang',
        'deskripsi_barang',
        'jumlah_barang',
        'image',
    ];
}
