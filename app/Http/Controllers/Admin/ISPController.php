<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\IspLocation;

class ISPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isp = IspLocation::latest()->paginate(10);
        $countries = Country::all();
        return view("admin.product.isp", ["isps" => $isp, "countries" => $countries]);
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
        ]);

        $data = IspLocation::create($request->all());

        return response()->json([
            "message" => "Successfully Isp Update",
            "result" => $data
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
        IspLocation::find($id)->delete();
        return response()->json([
            "message" => "Department Successfuly Remove"
        ], 200);
    }
}
