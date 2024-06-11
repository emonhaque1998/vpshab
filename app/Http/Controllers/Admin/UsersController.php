<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view("admin.users.all-users", ["users" => $users]);
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
        $users = User::where("email", $request->searchText)
                            ->orWhere('name', 'like', "%" . $request->searchText . "%")->latest()->paginate(10);

        return view("admin.users.search-user", ["users" => $users]);
        
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
        $response = User::find($id)->delete();

        if($response){
            return response()->json([
                "message" => "Succefully Deleted"
            ], 200);
        }

        return response()->json([
            "message" => "Something is Wrong"
        ], 500);
    }
}
