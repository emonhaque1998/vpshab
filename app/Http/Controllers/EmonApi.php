<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmonApi extends Controller
{
    public function index(){
        // Url to the client API

        $url = "https://vps.aodream.net/api/client";

        // Specify the key, hash and action

        $postfields["key"] = "X9AJM-FA6UK-NZG2F";

        $postfields["hash"] = "ad6bfa396bf40a807087c345e73452502e9e5a1c";

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

        return $result;
    }
}
