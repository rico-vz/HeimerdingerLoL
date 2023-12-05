<?php

namespace App\View\Components\About\Faq;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public function __construct(
        public string $question,
        public string $answer
    )
    {
    }

    public function render(): View
    {
        return view('components.about.faq.dropdown');
    }
}
