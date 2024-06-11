<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ApiCallingController extends Controller
{
    protected function ApiCore($id, $api_key, $api_has, $action){
// Api Check Status
        // Url to the client API

        $url = "https://vps.aodream.net/api/client";

        // Specify the key, hash and action

        $postfields["key"] = $api_key;

        $postfields["hash"] = $api_has;

        $postfields["action"] = $action; // reboot, shutdown, boot, status

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
        if($action === "boot" || $action === "reboot"){
            if($result["status"] === "success"){
                Order::find($id)->update([
                    "api_status" => "online"
                ]);
            }
        }else{
            if($result["status"] === "success"){
                Order::find($id)->update([
                    "api_status" => "offline"
                ]);
            }
        }
    }

    public function index($id){
        $order = Order::find($id);

        $this->ApiCore($order->id, $order->api_key, $order->api_hash, "shutdown");
        return redirect()->route("my-services.index");
    }

    public function boot($id){
        $order = Order::find($id);
        $this->ApiCore($order->id, $order->api_key, $order->api_hash, "boot");
        return redirect()->route("my-services.index");
    }

    public function restartApi($id){
        $order = Order::find($id);
        $this->ApiCore($order->id, $order->api_key, $order->api_hash, "reboot");        
        return redirect()->route("my-services.index");
    }
}
