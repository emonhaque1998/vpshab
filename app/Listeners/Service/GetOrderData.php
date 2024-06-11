<?php

namespace App\Listeners\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Events\Service\MyServiceEvent;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class GetOrderData
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
    public function handle(MyServiceEvent $event): void
    {
        Cache::remember('wp_order_for_service', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return User::find(Auth::user()->id)->order()->latest()->paginate(10);
        });
    }
}
