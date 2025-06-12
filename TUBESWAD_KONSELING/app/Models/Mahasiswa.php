<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Model
{

    protected $fillable = [
        'nama',
        'nim',
        'fakultas',
    ];


    public function keluhan()
    {
        return $this->hasMany(Keluhan::class, 'mahasiswaId', 'mahasiswaId');
    }
}
