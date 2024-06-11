<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\VisitingSite;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddCountryCache implements ShouldQueue
{
    use InteractsWithQueue;
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
        // Get the absolute path to the JSON file
        $countryList = public_path('countries.json');
        $countryJson = null;

        // Check if the file exists
        if (file_exists($countryList)) {
            // Read the contents of the JSON file
            $jsonContents = file_get_contents($countryList);

            // Decode the JSON contents into a PHP array
            $data = json_decode($jsonContents, true);

            Cache::remember("wp_country_list_w_state", Carbon::now()->addDays(7), function() use ($data){
                return $data;
            });
        }
    }
}
