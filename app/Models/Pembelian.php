<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable = [
        'customer_id',
        'nama_barang',
        'jumlah_pembelian',
        'tanggal_masuk',
    ];    
    
    public function customers() {
        return $this->belongsTo(Customer::class);
    }

    use HasFactory;
}
