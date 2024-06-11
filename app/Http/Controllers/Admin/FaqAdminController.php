<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Faq::latest()->first();
        return view("admin.website-information.faq", ["information" => $data]);
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
        $result = Faq::updateOrCreate(
            [
                'id' => Faq::latest()->first() ? Faq::latest()->first()->id : null
            ],
            [
                "faq" => $request->get("faq"),
            ]
        );

        if($result){
            return response()->json([
                "message" => "Successfuly Update!"
            ], 200);
        }

        return response()->json([
            "message" => "Server Problem!"
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
