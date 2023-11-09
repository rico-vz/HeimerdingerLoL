<?php

namespace App\View\Components\Skins;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class Paginatedlist extends Component
{

    public function __construct(public Paginator $skins)
    {
    }

    public function render(): View
    {
        return view('components.skins.paginatedlist');
    }
}
