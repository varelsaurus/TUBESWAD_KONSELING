<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalKonseling extends Model
{
    protected $fillable = [
        'nama_mahasiswa',
        'topik',
        'waktu_konseling',
    ];
}
