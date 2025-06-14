<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;

    protected $primaryKey = 'konselingId';
    
    protected $fillable = [
        'nama_mahasiswa',
        'topik',
        'waktu_konseling',
        'status'
    ];

    protected $casts = [
        'waktu_konseling' => 'datetime'
    ];

    // Relationship dengan mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    // Relationship dengan konselor
    public function konselor()
    {
        return $this->belongsTo(Konselor::class, 'konselor_id');
    }

    // Scope untuk konseling yang menunggu
    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    // Scope untuk konseling yang diterima
    public function scopeDiterima($query)
    {
        return $query->where('status', 'diterima');
    }

    // Scope untuk konseling yang selesai
    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai');
    }
} 