<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ResidentialRDPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageInfo = Cache::remember('wp_page_info', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Page::latest()->first();
        });

        $productInCategory = Cache::remember('wp_category_product_info_rdp', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Category::with("product")->where("category_slug", "residential-rdp")->first();
        });

        return view("frontend.rasidential-rdp", ["pageInformation" => $pageInfo, "category" => $productInCategory]);
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
