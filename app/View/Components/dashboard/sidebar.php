<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $isRoute = 'bg-accent1 text-secondary font-bold px-3 py-1 rounded flex gap-1.5 items-center';
        $isNotRoute = 'hover:translate-x-4 hover:bg-accent2 px-3 py-1 rounded flex gap-1.5 items-center hover:text-secondary transition-all';
        return view('components.dashboard.sidebar', compact('isRoute', 'isNotRoute'));
    }
}
