<?php

namespace App\View\Components\Streamerpanel;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StreamerCreateForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $champions)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.streamerpanel.streamer-create-form');
    }
}
