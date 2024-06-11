<?php

namespace App\View\Components;

use App\Events\VisitingSite;
use Closure;
use Carbon\Carbon;
use Illuminate\View\Component;
use App\Models\websiteinformation;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class HomeLayout extends Component
{
    /**
     * Create a new component instance.
     */

    public $information;

    public function __construct()
    {
        if(! Cache::has("wp_info")){
            VisitingSite::dispatch();
        }

        $this->information = Cache::get("wp_info");
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("layouts.home-layout");
    }
}
