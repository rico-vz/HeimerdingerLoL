<?php

namespace App\View\Components\Icons;

use App\Models\SummonerIcon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class List_all extends Component
{
    public function __construct(public SummonerIcon $icons)
    {
    }

    public function render(): View
    {
        return view('components.icons.list_all');
    }
}
