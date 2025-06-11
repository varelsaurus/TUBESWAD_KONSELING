<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Model
{
    use HasApiTokens, HasFactory;

    //
    protected $table = 'mahasiswa';
    protected $primaryKey = 'mahasiswaId';
    protected $fillable = [
        'mahasiswaId',
        'nama',
        'nim',
        'kontak',
    ];
    public $timestamps = true;
    protected $casts = [
        'mahasiswaId' => 'integer',
    ];
    public function keluhan()
    {
        return $this->hasMany(Keluhan::class, 'mahasiswaId', 'mahasiswaId');
    }
}
