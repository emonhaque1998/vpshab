<?php

namespace App\Listeners\Privacy;

use Carbon\Carbon;
use App\Models\Privacy;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Privacy\CreatePrivacyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePrivacyListener 
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
    public function handle(CreatePrivacyEvent $event): void
    {
        $termsData = Privacy::updateOrCreate(
            [
                'id' =>  Privacy::latest()->first() ?  Privacy::latest()->first()->id : null
            ],
            [
                "privacy_title" => $event->privacyTitle,
                "privacy_body" => $event->privacyEditor
            ]
        );

        if(Cache::has("wp_privacy_cache")){
            Cache::forget("wp_privacy_cache");
        }

        Cache::put('wp_privacy_cache', $termsData, Carbon::now()->addDays(30));
    }
}
