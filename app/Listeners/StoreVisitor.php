<?php

namespace App\Listeners;

use App\Models\Visitor;
use App\Events\VisitorCount;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreVisitor implements ShouldQueue
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
    public function handle(VisitorCount $event): void
    {
        // Check if the IP address exists in the database
        $visitor = Visitor::where('ip_address', $event->ip)->first();

        if (!isset($visitor)) {
            // If the IP address doesn't exist, create a new record
            Visitor::create([
                'ip_address' => $event->ip,
            ]);
        }
    }
}
