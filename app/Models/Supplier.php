<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemasok',
        'alamat_pemasok',
        'telepon_pemasok'
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
