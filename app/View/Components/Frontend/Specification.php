<?php

namespace App\View\Components\Frontend;

use Closure;
use Carbon\Carbon;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Specification as ModelSpecification;

class Specification extends Component
{
    /**
     * Create a new component instance.
     */
    public $specifications;
    public function __construct()
    {
        $this->specifications = Cache::remember('wp_specification', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return ModelSpecification::all();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.specification');
    }
}
