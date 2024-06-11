<?php

namespace App\View\Components;

use App\Models\Support;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $support;
    public function __construct()
    {
        $this->support = Support::first();
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
