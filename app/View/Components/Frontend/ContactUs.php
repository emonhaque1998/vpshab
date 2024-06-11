<?php

namespace App\View\Components\Frontend;

use Closure;
use App\Models\Support;
use Illuminate\Support\Carbon;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class ContactUs extends Component
{
    /**
     * Create a new component instance.
     */
    public $supports;
    public function __construct()
    {
        $this->supports = Cache::remember('wp_all_support', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Support::latest()->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.contact-us');
    }
}
