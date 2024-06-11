<?php 

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ControllerClasses{
    function __construct()
    {
        // 
    }

    function getCountry(){
        // Get the absolute path to the JSON file
        $countryList = public_path('countries.json');
        $countryJson = null;

        // Check if the file exists
        if (file_exists($countryList)) {
            // Read the contents of the JSON file
            $jsonContents = file_get_contents($countryList);

            // Decode the JSON contents into a PHP array
            $data = json_decode($jsonContents, true);

            $countryJson = Cache::remember("wp_country_list_w_state", Carbon::now()->addDays(7), function() use ($data){
                return $data;
            });

            return $countryJson;
        }
    }
}