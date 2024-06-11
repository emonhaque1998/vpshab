<?php

namespace App\View\Components;

use Closure;
use App\Models\Support;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class MessageLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $supports;
    public function __construct()
    {
        $this->supports = Support::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.message-layout');
    }
}
