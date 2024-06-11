<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CheckCountryStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         
        $countryList = Cache::get("wp_country_list_w_state");
        
        foreach ($countryList as $country) {
            if($country["code3"] === $id){
                return response()->json([
                    "result" => $country["states"]
                 ], 200);       
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
