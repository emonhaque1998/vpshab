<?php

namespace App\View\Components\Frontend;

use Closure;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class MapState extends Component
{
    /**
     * Create a new component instance.
     */
    public $countries;
    public function __construct()
    {
        $this->countries = Cache::remember('wp_country', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Country::all();
        });

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.map-state');
    }
}
