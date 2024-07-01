<?php

namespace App\View\Components\Skins;

use App\Models\ChampionSkin;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Grid_info extends Component
{
    public function __construct(public ChampionSkin $skin) {}

    public function render(): View
    {
        return view('components.skins.grid_info');
    }
}
