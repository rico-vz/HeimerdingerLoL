<?php

namespace App\View\Components\Icons;

use App\Models\SummonerIcon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class View_grid extends Component
{
    public function __construct(public SummonerIcon $icon)
    {
    }

    public function render(): View
    {
        return view('components.icons.view_grid');
    }
}
