<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Layout extends Component
{
    public function render(): View
    {
        return view('components.layout');
    }
}
