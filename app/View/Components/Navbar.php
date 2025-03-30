<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\MataPelajaran;

class Navbar extends Component
{
    public $kejuruan;
    public $umum;

    public function __construct()
    {
        $this->kejuruan = MataPelajaran::where('kategori', 'kejuruan')->get();
        $this->umum = MataPelajaran::where('kategori', 'umum')->get();
    }

    public function render()
    {
        return view('components.navbar');
    }
}
