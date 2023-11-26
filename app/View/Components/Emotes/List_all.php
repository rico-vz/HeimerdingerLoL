<?php

namespace App\View\Components\Emotes;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class List_all extends Component
{
    public function render(): View
    {
        return view('components.emotes.list_all');
    }
}
