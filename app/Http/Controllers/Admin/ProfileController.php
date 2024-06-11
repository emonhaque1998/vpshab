<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ControllerClasses;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country = new ControllerClasses();
        $countryJson = $country->getCountry(); 
        
        return view("admin.user.profile", ["countries" => $countryJson]);
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
            "address" => "required",
            "country"  => "required",
            "stateName" => "required",
            "zipcode" => "required",
            "designation" => "required",            
        ]);

        $updated = Admin::find(Auth::guard("admin")->user()->id)->update($request->all());
        if($updated){
            return response()->json([
                "message" => "Profile is updated"
            ], 200);
        }

        return response()->json([
            "message" => "Somethink is Wrong"
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
        //
    }
}
