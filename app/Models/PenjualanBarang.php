<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanBarang extends Model
{
    protected $fillable = [
        'nama_barang',
        'jumlah_barang',
        'tanggal_keluar',
    ];
    use HasFactory;
    protected $table = 'penjualan_barang';
}
