<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SingleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        return view("admin.product.single-product-edit", ["product" => $product]);
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
        $request->merge(['slug' => Str::slug($request->title)]);

        if ($request->has('status')) {
            // Checkbox is checked
            $request->merge([
                'status' => 'published',
            ]);
            Product::where("slug", $id)->update($request->except(['_token', "_method"]));
            Cache::forget("wp_all_product");
            Cache::forget("wp_last_there_product");
            Cache::forget("wp_category_product_info");
            return redirect()->route("all-products.index");
        } else {
            // Checkbox is not checked
            $request->merge([
                'status' => 'draft',
            ]);
            if($request->has("freshIp")){
                $request->merge([
                    'freshIp' => $request->has("freshIp"),
                ]);
            }
            Product::where("slug", $id)->update($request->except(['_token', "_method"]));
            Cache::forget("wp_all_product");
            Cache::forget("wp_last_there_product");
            Cache::forget("wp_category_product_info");
            return redirect()->route("all-products.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
