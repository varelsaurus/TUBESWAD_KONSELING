<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'spesialisasi',
        'kontak'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function konselings()
    {
        return $this->hasMany(Konseling::class, 'konselor_id');
    }
}
