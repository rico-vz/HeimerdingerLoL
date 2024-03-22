<?php

namespace App\View\Components\Streamerpanel;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Streamer;
use Illuminate\Support\Collection;

class StreamersTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Collection $streamers)
    {
        $this->streamers = $streamers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.streamerpanel.streamers-table');
    }
}
