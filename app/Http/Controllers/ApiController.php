<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Country;
use App\User;

class ApiController extends Controller
{
    public function bringCountries()
    {
        $countries = Country::get();

        return response()->json($countries);
    }

    public function validUsername(Request $request)
    {
        $answer;
        $user = User::select('username')
                    ->where('username', $request->username)
                    ->get();

        if(count($user) == 0) {
            $answer = 1;
        } else {
            $answer = 0;
        }

        return response()->json($answer);
    }

    public function validEmail(Request $request)
    {
        $answer;
        $user = User::select('email')
                    ->where('email', $request->email)
                    ->get();
                    
        if(count($user) == 0) {
            $answer = 1;
        } else {
            $answer = 0;
        }

        return response()->json($answer);
    }

    public function bringPjByUserName(Request $request) 
    {
        $client = new Client([
            'base_uri' => '145.239.19.132:3001/',
            'timeout'  => 20.0,
        ]);
        $req = 'charactersByAccount/'.$request->username;
        $response = $client->request('GET', $req);
        return $response->getBody()->getContents();
    }
}
