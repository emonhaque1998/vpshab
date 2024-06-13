<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::latest()->paginate(10);
        return view("admin.product.country-list", ["countris" => $countries]);
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
            "name" => "required",
            "horizontal" => "required",
            "vertical" => "required"
        ]);

        $data = Country::updateOrCreate([
            "id" => $request->countryId
        ] ,[
            "name" => $request->name,
            "vertical" => $request->vertical,
            "horizontal" => $request->horizontal
        ]);
        Cache::forget('wp_country');

        return response()->json([
            "message" => "Successfully Country Update",
            "returnData" => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Country::find($id);
        
        if($data){
            return response()->json([
                "returnData" => $data
            ], 200);
        }

        return response()->json([
            "message" => "Data Not Found"
        ], 200);
        
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
        $result = Country::find($id)->delete();

        if($result){
            return response()->json([
                "message" => "Data Deleted Successful"
            ], 200);
        }

        return response()->json([
            "message" => "Something is Wrong!"
        ], 500);
    }
}
