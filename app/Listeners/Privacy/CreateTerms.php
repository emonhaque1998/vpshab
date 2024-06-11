<?php

namespace App\Listeners\Privacy;

use Carbon\Carbon;
use App\Models\Term;
use App\Models\Privacy;
use App\Events\Privacy\CreateTrams;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateTerms 
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
    public function handle(CreateTrams $event): void
    {
        $termsData = Term::updateOrCreate(
            [
                'id' => Term::latest()->first() ? Term::latest()->first()->id : null
            ],
            [
                "terms_title" => $event->termsTitle,
                "terms_body" => $event->tramsEditor
            ]
        );

        if(Cache::has("wp_terms_cache")){
            Cache::forget("wp_terms_cache");
        }

        Cache::put('wp_terms_cache', $termsData, Carbon::now()->addDays(30));
    }
}
