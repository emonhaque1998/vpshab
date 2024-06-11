<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submit extends Component
{
    /**
     * Create a new component instance.
     */

    public $btnId;
    public $btnText;
    public $disableData;
    public function __construct($btnId, $btnText, $disableData = null)
    {
        $this->btnId = $btnId;
        $this->btnText = $btnText;
        $this->disableData = $disableData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.submit');
    }
}
