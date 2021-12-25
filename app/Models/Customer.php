<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_customer',
        'kategori_daerah',
        'alamat_customer',
        'telp_customer',
    ];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }
}
