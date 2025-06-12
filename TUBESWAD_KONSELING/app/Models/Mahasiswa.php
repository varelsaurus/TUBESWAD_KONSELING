<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'fakultas',
    ];
<<<<<<< Updated upstream


    public function keluhan()
    {
        return $this->hasMany(Keluhan::class, 'mahasiswaId', 'mahasiswaId');
    }
=======
>>>>>>> Stashed changes
}
