<?php

namespace App\Http\Controllers\Admin;

use App\Events\Privacy\CreateTrams;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termsData = Cache::get("wp_terms_cache");
        return view("admin.website-information.terms-condition",  ["terms" => $termsData]);
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
        CreateTrams::dispatch($request->get("termTitle"), $request->get("termsEditor"));
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
