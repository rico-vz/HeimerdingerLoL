<?php

namespace App\View\Components\Home;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class upcoming_skins extends Component
{
    public function __construct(public array $upcomingSkins)
    {
    }

    public function render(): View
    {
        return view('components.home.upcoming_skins');
    }
}
