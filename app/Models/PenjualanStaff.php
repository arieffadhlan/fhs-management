<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanStaff extends Model
{
    use HasFactory;
            
    protected $fillable = [
            'nama_staff',
            'nama_barang',
            'jumlah_penjualan',
            'tanggal_penjualan',
    ];
}
