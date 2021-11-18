<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jumlah_barang',
        'tanggal_keluar',
    ];

    protected $table = 'penjualan_barang';
}
