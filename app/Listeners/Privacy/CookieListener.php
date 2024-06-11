<?php

namespace App\Listeners\Privacy;

use Carbon\Carbon;
use App\Models\Cookie;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Privacy\CreateCookieEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class CookieListener
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
    public function handle(CreateCookieEvent $event): void
    {
        $termsData = Cookie::updateOrCreate(
            [
                'id' =>  Cookie::latest()->first() ?  Cookie::latest()->first()->id : null
            ],
            [
                "cookie_title" => $event->cookieTitle,
                "cookie_body" => $event->cookieEditor
            ]
        );

        if(Cache::has("wp_cookie_cache")){
            Cache::forget("wp_cookie_cache");
        }

        Cache::put('wp_cookie_cache', $termsData, Carbon::now()->addDays(30));
    }
}
