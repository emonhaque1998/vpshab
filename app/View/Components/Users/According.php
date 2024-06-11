<?php

namespace App\View\Components\Users;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class According extends Component
{
    /**
     * Create a new component instance.
     */

    public $accordingId;
    public $accordingTitle;
    public $accordingIcon;

    public function __construct($id, $title, $icon)
    {
        $this->accordingId = $id;
        $this->accordingTitle = $title;
        $this->accordingIcon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.users.according');
    }
}
