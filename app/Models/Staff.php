<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_staff',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat_staff',
        'email_staff',
        'telp_staff',
    ];

    public function PenjualanStaff()
    {
        return $this->hasMany(PenjualanStaff::class);
    }
}
