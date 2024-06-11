<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AllProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::latest()->paginate(10);

        $categories = Cache::remember('wp_category', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Category::all();
        });

        return view("admin.product.all-products", ["information" => $data, "categories" => $categories]);
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
        $product = Product::where("slug", $id)->first();


        if($product){
            return view("admin.product.single-product", ["product" => $product]);
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cateoryWiseProduct = Category::where("category_slug", $id)->first();


        if($cateoryWiseProduct){
            return response()->json([
                "message" => "Showing only " . Str::of($id)->replace('-', ' ')->title() . " Product :)",
                "result" => $cateoryWiseProduct->product
            ], 200);
        }
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
        $response = Product::where("slug", $id)->first()->delete();

        if($response){
            Cache::forget("wp_all_product");
            return response()->json([
                "message" => "Succefully Deleted"
            ], 200);
        }

        return response()->json([
            "message" => "Something is Wrong"
        ], 500);
    }
}
