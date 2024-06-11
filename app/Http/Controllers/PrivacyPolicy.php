<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PrivacyPolicy extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termsData = Cache::get("wp_terms_cache");
        $privacyData = Cache::get("wp_privacy_cache");
        $cookieData = Cache::get("wp_cookie_cache");

        return view("privacy-policy", ["terms" => $termsData, "privacy" => $privacyData, "cookie" => $cookieData]);
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
