<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'usia_kehamilan',
        'berat_badan',
        'tinggi_badan',
        'lingkar_perut',
        'lingkar_lengan',
        'tekanan_darah',
        'nomor_wa',
        'alamat'
    ];

    protected $casts = [
        'berat_badan' => 'decimal:2',
        'tinggi_badan' => 'decimal:2',
        'lingkar_perut' => 'decimal:2',
        'lingkar_lengan' => 'decimal:2'
    ];
}
