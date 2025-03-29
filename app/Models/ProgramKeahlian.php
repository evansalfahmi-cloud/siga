<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $table = 'program_keahlian';

    public function mata_pelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'program_keahlian_id', 'id');
    }

    public function mataPelajaran()
{
    return $this->hasMany(MataPelajaran::class, 'program_keahlian_id');
}
}
