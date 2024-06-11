<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::latest()->paginate(10);
        return view("admin.product.category", ["information" => $data]);
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
        $request->merge(["category_slug" => Str::slug($request->category_name)]);
        $request->validate([
            "category_name" => "required",
            "category_slug" => "unique:categories,category_slug",
        ]);

        $data = Category::create($request->all());
        Cache::forget('wp_category');

        return response()->json([
            "message" => "Successfully Product Uploaded",
            "returnData" => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::where("category_slug", $id)->first();

        if(!$data){
            return response()->json([
                "message" => "Record Not found"
            ], 404);
        }

        return response()->json([
            "message" => "Record Found",
            "returnData" => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where("category_slug", $id)->first();
        if($category){
            return view("admin.product.edit-category", ["category" => $category]);
        }
        return redirect()->route("category.index");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryUpdate = Category::where("category_slug", $id)->first();
        if($categoryUpdate){
            $categoryUpdate->category_name = $request->category_name;
            $categoryUpdate->category_slug = Str::slug($request->category_name);
            $categoryUpdate->save();
            Cache::forget("wp_category");
            return redirect()->route("category.index");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Category::where("category_slug", $id)->first()->delete();
        if($result){
            return response()->json([
                "message" => "Successfully Delete Category"
            ], 200);
        }
        return response()->json([
            "message" => "Server Problem!"
        ], 500);
    }
}
