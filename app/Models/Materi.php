<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    protected $fillable = [
        'judul_materi',
        'mata_pelajaran',
        'deskripsi',
        'user_id',
    ];

    // Relasi ke User (Guru)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
