<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori_barang',
        'jumlah_transaksi',
        'status_barang',
        'nama_supplier',
        'petugas_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
