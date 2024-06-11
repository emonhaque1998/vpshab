<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Events\Service\MyServiceEvent;
use App\Models\Order;

class MyServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = User::find(Auth::user()->id)->order()->latest()->paginate(10);

        foreach ($orders as $order) {
            if($order->api_key && $order->api_hash){
                // Api Check Status
                // Url to the client API

                $url = "https://vps.aodream.net/api/client";

                // Specify the key, hash and action

                $postfields["key"] = $order->api_key;

                $postfields["hash"] = $order->api_hash;

                $postfields["action"] = "status"; // reboot, shutdown, boot, status

                // Send the query to the solusvm master

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $url . "/command.php");

                curl_setopt($ch, CURLOPT_POST, 1);

                curl_setopt($ch, CURLOPT_TIMEOUT, 20);

                curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);

                $data = curl_exec($ch);

                curl_close($ch);

                // Parse the returned data and build an array

                preg_match_all('/<(.*?)>([^<]+)<\/\\1>/i', $data, $match);

                $result = array();

                foreach ($match[1] as $x => $y)
                {
                    $result[$y] = $match[2][$x];
                }
                if($result["status"] === "success"){
                    Order::find($order->id)->update([
                        "api_status" => $result["statusmsg"],
                    ]);
                }else{
                    Order::find($order->id)->update([
                        "api_status" => $result["status"],
                    ]);
                }
            }
        }

        return view("users.my-service", ["orders" => User::find(Auth::user()->id)->order()->latest()->paginate(10)]);
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
