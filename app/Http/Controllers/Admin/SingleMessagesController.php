<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Conversation;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingleMessagesController extends Controller
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
        $request->validate([
            "message" => "required",
            "contact_id" => "required",
        ]);

        $message = Conversation::create([
            "message" => $request->get("message"),
            "contact_id" => $request->get("contact_id"),
            "owner" => "admin",
            "admin_id" => Auth::guard("admin")->user()->id,
        ]);

        if($message){
            return response()->json([
                "message" => "Your replay is successfully send",
                "result" => $message
            ], 200);
        }


        return response()->json([
            "message" => "Somehing Wrong"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::where("slug", $id)->first();
        return view("admin.support.single-message", ["contact" => $contact]);
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
