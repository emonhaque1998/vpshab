<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\VisitingSite;
use App\Models\websiteinformation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetWebInfoData 
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
        Cache::remember('wp_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return websiteinformation::latest()->first();
        });
    }
}
