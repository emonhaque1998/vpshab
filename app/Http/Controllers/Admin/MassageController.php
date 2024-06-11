<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Support;
use Illuminate\Http\Request;

class MassageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Support::all();
        return view("admin.support.messages", ["supports" => $supports]);
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
        $contacts = Support::where("slug", $id)->first()->contact;
        return view("admin.support.messages", ["contacts" => $contacts]);
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
