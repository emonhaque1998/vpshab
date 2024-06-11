<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Events\Privacy\CreatePrivacyEvent;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privacyData = Cache::get("wp_privacy_cache");

        return view("admin.website-information.privacy-policy", ["privacy" => $privacyData]);
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
        CreatePrivacyEvent::dispatch($request->get("privacyTitle"), $request->get("privacyEditor"));
        return response()->json([
            "message" => "Successfully Country Update",
        ], 200);
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
