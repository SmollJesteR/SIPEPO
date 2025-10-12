<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lansia extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'tekanan_darah',
        'tinggi_badan',
        'berat_badan',
        'alamat',
        'nomor_wa'
    ];

    protected $casts = [
        'tinggi_badan' => 'decimal:2',
        'berat_badan' => 'decimal:2'
    ];
}
