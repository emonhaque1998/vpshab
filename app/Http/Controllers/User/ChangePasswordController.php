<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("users.change-password");
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
            "oldPass" => "required",
            "newPwd" => "required|string|min:8|confirmed",
            "newPwd_confirmation" => "required"
        ],[
            "oldPass.required" => "The current password is required.",
            "newPwd.required" => "The New password is required.",
            "newPwd_confirmation.required" => "The Confirmed password is required.",
            "newPwd.min" => "The new password must be at least 8 characters.",
            "newPwd.confirmed" => "The new password confirmation does not match.",
        ]);

        $user = Auth::user();

        if (!Hash::check($request->oldPass, $user->password)) {
            return response()->json(['error' => 'Current password is incorrect'], 401);
        }

        $update = User::find($user->id)->update([
            "password" => Hash::make($request->newPwd)
        ]);

        if($update){
            return response()->json([
                "message" => "Successfull Update Password"
            ], 200);
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
