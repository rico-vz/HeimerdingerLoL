<?php

namespace App\View\Components\Sales;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Current_sales extends Component
{
    public function __construct(public array $sales)
    {
    }
    public function render(): View
    {
        return view('components.sales.current_sales');
    }
}
