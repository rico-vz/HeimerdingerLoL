<?php

namespace App\View\Components\Skins;

use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\View\Component;

class Paginatedlist extends Component
{
    public function __construct(public Paginator $skins, public array $rarityColor)
    {
    }

    public function render(): View
    {
        return view('components.skins.paginatedlist');
    }
}
