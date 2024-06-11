<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Support;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendContactFromUser;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cache::remember('wp_all_support', Carbon::now()->addDays(7), function () {
            // Code to fetch the data if not found in the cache
            return Support::latest()->get();
        });
        return view("frontend.contact", ["supports" => $data]);
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

        $slugCandidate = $request->get("subject"). '-' . now()->timestamp;

        $request->merge([
            "slug" => Str::slug($slugCandidate),
        ]);
        
        $request->validate([
            "name" => "required",
            "email" => "required",
            "subject" => "required",
            "message" => "required",
            "slug" => "required",
            "support_id" => "required"
        ]);


        if(Auth::check()){
            $request->merge(['user_id' => Auth::user()->id]);
            $constact = Contact::create($request->all());
            if($constact){
                Conversation::create([
                    "message" => $request->get("message"),
                    "contact_id" => $constact->id,
                ]);
            }
            SendContactFromUser::dispatch($constact);
            return response()->json(["message" => "Your Ticket is Submited"], 200);
        }else{
            $contact = Contact::create($request->all());
            SendContactFromUser::dispatch($contact);
            return response()->json(["message" => "Your Form is Submited"], 200);
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
