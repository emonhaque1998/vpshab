<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SpecificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specification = Specification::latest()->paginate(10);

        return view("admin.website-information.specifications", ["information" => $specification]);
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
            "features" => "required",
            "performance" => "required",
            "boosters" => "required"
        ]);

        $storeData = Specification::create($request->all());

        if($storeData){
            Cache::forget("wp_specification");
            return response()->json([
                "message" => "Successfuly Updated",
                "result" => $storeData
            ], 200);
        }

        return response()->json([
            "message" => "Something is Wrong"
        ], 500);
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

        $result = Specification::find($id)->delete();

        if($result){
            return response()->json([
                "message" => "Data successfuly Deleted"
            ], 200);
        }

        return response()->json([
            "message" => "Something is Wrong"
        ], 500);
    }
}
