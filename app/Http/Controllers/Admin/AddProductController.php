<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AddProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cache::remember('wp_category', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Category::all();
        });

        $countries = Cache::remember('wp_country', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Country::all();
        });

        return view("admin.product.add-product", ["information" => $data, "countries" => $countries]);
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
            "monthly_price" => "numeric|required",
            "annual_price" => "numeric|required",
            "discount" => "required",
            "ram" => "numeric|required",
            "disk" => "numeric|required",
            "operating_system" => "required",
            "bandwidth"  => "numeric|required",
            "virtualization"  => "required",
            "country_id"  => "required",
            "currency"  => "required",
            "category_id"  => "numeric|required",
            "slug" => "unique:products,slug"
        ]);

        $request->merge([
            'freshIp' => $request->has("freshIp"),
        ]);


        if ($request->has('status')) {
            // Checkbox is checked
            $request->merge([
                'status' => 'published',
            ]);
            Product::create($request->all());
            Cache::forget("wp_all_product");
            Cache::forget("wp_last_there_product");
            Cache::forget("wp_category_product_info");
            return response()->json(["message" => "Successfully Product Uploaded"], 200);
        } else {
            // Checkbox is not checked
            $request->merge([
                'status' => 'draft',
            ]);
            Product::create($request->all());
            Cache::forget("wp_all_product");
            Cache::forget("wp_last_there_product");
            Cache::forget("wp_category_product_info");
            return response()->json(["message" => "Your product store in Draft"], 200);
        }
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
