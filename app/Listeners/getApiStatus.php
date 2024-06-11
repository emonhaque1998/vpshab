<?php

namespace App\Listeners;

use App\Events\ApiStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class getApiStatus
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
    public function handle(ApiStatus $event): void
    {
        //
    }
}
