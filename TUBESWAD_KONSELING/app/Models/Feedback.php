<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'pilih', 'isi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
