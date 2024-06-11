<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\Banner;
use App\Events\VisitingSite;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetBannerData
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VisitingSite $event): void
    {
        Cache::remember('wp_banner_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Banner::latest()->first();
        });
    }
}
