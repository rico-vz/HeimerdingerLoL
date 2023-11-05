<?php

namespace App\View\Components\home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class recent_skins extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        public array $skins;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.recent_skins');
    }
}
