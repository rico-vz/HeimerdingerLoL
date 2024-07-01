<?php

namespace App\View\Components\Champions;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class List_all extends Component
{
    public function __construct(public array $champions, public array $roles) {}

    public function render(): View
    {
        return view('components.champions.list_all');
    }
}
