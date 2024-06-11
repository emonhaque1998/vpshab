<?php

namespace App\Http\Controllers\Frontend;

use App\Events\VisitingSite;
use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Mapinformation;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        VisitingSite::dispatch();

        $products = Cache::get("wp_last_there_product");

        $countries = Cache::get("wp_country");

        $map = Cache::get("wp_map");

        $data = Cache::get("wp_banner_info");

        return view("welcome", ["information" => $data, "products" => $products, "countries" => $countries, "map" => $map, ]);
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
        //
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
