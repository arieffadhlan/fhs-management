<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table="stocks";
    protected $fillable=[
        'nama_brg',
        'kategori_brg',
        'deskripsi_brg',
        'jumlah_brg',
        'image',
    ];
}
