<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\VisitingSite;
use App\Models\Mapinformation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetMapData 
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
        Cache::remember('wp_map', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Mapinformation::latest()->first();
        });
    }
}
