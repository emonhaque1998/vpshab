<?php

namespace App\Http\Controllers\Admin;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $support = Support::latest()->paginate(10);
        return view("admin.support.support", ["information" => $support]);
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
        $request->merge(["slug" => $request->get("name")]);
        $request->validate([
            "name" => "required",
            "email" => "required",
            "slug" => "required"
        ]);

        $storeData = Support::create($request->all());

        if($storeData){
            Cache::forget("wp_all_support");
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
        Support::find($id)->delete();
        Cache::forget("wp_all_support");
        return response()->json([
            "message" => "Department Successfuly Remove"
        ], 200);

    }
}
