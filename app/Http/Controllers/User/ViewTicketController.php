<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewTicketController extends Controller
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
            "message" => "required"
        ], [
            "message.required" => "Please provide your problem Details"
        ]);

        $data = Conversation::create([
            "message" => $request->get("message"),
            "contact_id" => $request->get("contactId")
        ]);

        if($data){
            return response()->json([
                "message" => "Ticket Message is Send",
                "result" => $data,
                "name" => Auth::user()->name
            ], 200);
        }
        return response()->json([
            "message" => "Server problem! Please try again latter",
        ], 200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Contact::where("slug", $id)->first();
        
        return view("users.view-ticket", ["ticket" => $ticket]);
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
        Contact::where("slug", $id)->update([
            "status" => true
        ]);

        return redirect()->route("ticket.index");
    }
}
