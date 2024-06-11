<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mapinformation;
use Illuminate\Support\Facades\Cache;

class MapInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $map = Cache::remember('wp_map', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Mapinformation::latest()->first();
        });
        return view("admin.website-information.map-information", ["information" => $map]);
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
        $request->validate([
            "sub_title" => "required",
        ]);

        $data = Cache::remember('wp_map', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Mapinformation::latest()->first();
        });


        if(isset($data)){
            if($request->sub_title == $data->sub_title) {
                return response()->json(["message" => "No changes found"], 400);
            }
        }


        $response = Mapinformation::updateOrCreate([
            "id"=> $data == null ? "" : $data->id,
        ],$request->all());

        if($response){
            Cache::forget('wp_map');
            return response()->json(["message" => "Successfully Site Updated"], 200);
        }
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
