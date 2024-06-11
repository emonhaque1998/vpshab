<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cache::remember('wp_banner_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Banner::latest()->first();
        });
        return view("admin.website-information.banner", ["information" => $data]);
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

        $data = Cache::remember('wp_banner_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Banner::latest()->first();
        });

        if (isset($data)) {
            if ($request->title == $data->title && $request->discription == $data->discription && $request->btn1_name == $data->btn1_name && $request->btn2_name == $data->btn2_name) {
                return response()->json(["message" => "No changes found"], 400);
            }
        }

        $response = Banner::updateOrCreate([
            "id" => $data == null ? "" : $data->id,
        ], $request->all());

        if ($response) {
            Cache::forget('wp_banner_info');
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
