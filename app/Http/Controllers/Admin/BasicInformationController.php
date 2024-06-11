<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\websiteinformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class BasicInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cache::remember('wp_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return websiteinformation::latest()->first();
        });
        return view("admin.website-information.basic-information", ["information" => $data]);
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
        $data = Cache::remember('wp_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return websiteinformation::latest()->first();
        });


        if(isset($data)){
            if($request->top_title == isset($data->top_title) && $request->phone_number == isset($data->phone_number) && $request->facebook == isset($data->facebook) && $request->youtube == isset($data->youtube) && $request->twiter == isset($data->twiter) && $request->instagram == isset($data->instagram) && $request->wb_site_short_about == isset($data->wb_site_short_about)) {
                return response()->json(["message" => "No changes found"], 400);
            }
        }


        $response = websiteinformation::updateOrCreate([
            "id"=> $data == null ? "" : $data->id,
        ],$request->all());

        if($response){
            Cache::forget('wp_info');
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
