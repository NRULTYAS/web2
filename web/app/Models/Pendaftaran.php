<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'nama_orang_tua',
        'no_hp',
        'akte',
        'kk',
        'diterima',
    ];
}
