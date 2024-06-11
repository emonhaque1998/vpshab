<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cache::remember('wp_page_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Page::latest()->first();
        });

        return view("admin.website-information.page", ["information" => $data]);
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

        $data = Cache::remember('wp_page_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Page::latest()->first();
        });

        $request->validate([
            'videoUrl' => 'file|max:10240', // Max file size: 10MB
        ]);

        // Process the file upload
        if ($request->hasFile("videoUrl")) {
            $path = $request->file('videoUrl')->store('public');
            // You can save the file path to a database or perform any other actions here

            $response = Page::updateOrCreate([
                "id" => $data == null ? "" : $data->id,
            ], [
                "videoUrl" => Storage::url($path), 
                "pageSubTitle" => $request->pageSubTitle,
            ]);
            
            
            if($response){
                Cache::forget('wp_page_info');
                return response()->json([
                "message" => "File & Subtitle uploaded" 
            ], 200);
            }
            
        }else{
            $response = Page::updateOrCreate([
                "id" => $data == null ? "" : $data->id,
            ], [
                "pageSubTitle" => $request->pageSubTitle,
            ]);
            
            
            if($response){
                Cache::forget('wp_page_info');
                return response()->json([
                "message" => "Subtitle uploaded" 
            ], 200);
            }
        }

        
        return response()->json([
            "message" => "Something is Wrong" 
        ], 404);
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
