<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cupone;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CupponGenaratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuppons = Cupone::latest()->paginate(10);
        return view("admin.product.cuppon", ["cuppons" => $cuppons]);
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
            "validity" => "required",
            "discount" => "required"
        ], [
            "name.required" => "Please Input Name",
            "validity.required" => "Please Input Validity Day",
            "discount.required" => "Please Input Discount",
        ]);

        // Generate a unique coupon code
        $couponCode = Str::random(10);

        $result = Cupone::create([
            "name" => $request->get("name"),
            "cuppone_code" => $couponCode,
            "discount" => $request->get("discount"),
            "expiry" => now()->addDays($request->get("validity"))
        ]);

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
