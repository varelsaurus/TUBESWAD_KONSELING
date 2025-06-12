<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluhan extends Model
{
    use HasApiTokens, HasFactory;
    //
    protected $table = 'keluhan';
    protected $primaryKey = 'keluhanId';
    protected $fillable = [
        'mahasiswaId',
        'pesan',
        'status',
    ];
    public $timestamps = true;
    protected $casts = [
        'mahasiswaId' => 'integer',
        'status' => 'string',
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswaId', 'mahasiswaId');
    }
}
