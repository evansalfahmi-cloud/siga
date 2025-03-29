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
        'mata_pelajaran_id', // Harus sesuai dengan nama kolom di database
        'content', // Sesuai dengan perubahan migrasi
        'user_id',
    ];

    // Relasi ke User (Guru)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mata_pelajaran()
        {
            return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
        }
}
