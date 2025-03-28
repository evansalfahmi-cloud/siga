<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran';
    protected $fillable = ['nama_pelajaran', 'kategori', 'program_keahlian_id'];

    public function program_keahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'program_keahlian_id');
    }

    public function materi()
    {
        return $this->hasMany(Materi::class, 'mata_pelajaran_id');
    }

    
}


