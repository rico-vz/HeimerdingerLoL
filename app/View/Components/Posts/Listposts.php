<?php

namespace App\View\Components\Posts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Listposts extends Component
{
    public function __construct(public LengthAwarePaginator $posts)
    {
    }

    public function render(): View
    {
        return view('components.posts.listposts');
    }
}
