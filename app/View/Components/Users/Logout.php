<?php

namespace App\View\Components\Users;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logout extends Component
{
    /**
     * Create a new component instance.
     */
    public $routeName;
    public function __construct($routeName)
    {
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users.logout');
    }
}
