<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $table = "absence";

    protected $fillable = [
        'nama',
        'kelas',
        'hari',
        'tanggal',
        'bulan',
        'tahun',
        'kehadiran'
    ];
}
