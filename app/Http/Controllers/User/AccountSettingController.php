<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AccountSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countryJson = Cache::get("wp_country_list_w_state");
        return view("users.account-seting", ["countries" => $countryJson]);
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
            "addressFirst" => "required",
            "addressSecond" => "required",
            "companyName" => "required",
            "mobile" => "required",
            "country" => "required",
            "stateList"  => "required"
        ]);
        
        $userId = Auth::user()->id;

        $update = User::find($userId)->update([
            "addressFirst" => $request->addressFirst,
            "addressSecond" => $request->addressSecond,
            "companyName" => $request->companyName,
            "mobile" => $request->mobile,
            "country" => $request->country,
            "stateList"  => $request->stateList,
            "checkoutValidation" => true
        ]);
        
        if($update){
            return response()->json(["message" => "Your Information is Updated"], 200);
        }


        return response()->json(["message" => "Somethink is Wrong"], 500);
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
