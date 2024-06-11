<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement as ModelsAnnouncement;

class Announcement extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcement = ModelsAnnouncement::latest()->paginate(10);
        return view("admin.support.announcement", ["information" => $announcement]);
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
        $request->merge(['slug' => Str::slug($request->title)]);

        $request->validate([
            "title" => "required",
            "description" => "required",
            "slug" => "required|unique:announcements,slug"
        ],[
            "slug.unique" => "This post already taken.",
            "title.required" => "Title Not found"
        ]);

        $storeData = ModelsAnnouncement::create($request->all());

        if($storeData){
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
        ModelsAnnouncement::find($id)->delete();
        return response()->json([
            "message" => "Department Successfuly Remove"
        ], 200);
    }
}
