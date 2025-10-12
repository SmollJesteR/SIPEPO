<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'tanggal_lahir',
        'lingkar_kepala',
        'berat_badan',
        'tinggi_badan',
        'imunisasi',
        'nama_orang_tua',
        'kontak_orang_tua'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'lingkar_kepala' => 'decimal:2',
        'berat_badan' => 'decimal:2',
        'tinggi_badan' => 'decimal:2',
        'imunisasi' => 'array'
    ];
}
