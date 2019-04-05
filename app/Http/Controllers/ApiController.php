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
        $user = User::select('memb___id')
                    ->where('memb___id', $request->username)
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
        $user = User::select('mail_addr')
                    ->where('mail_addr', $request->email)
                    ->get();
                    
        if(count($user) == 0) {
            $answer = 1;
        } else {
            $answer = 0;
        }

        return response()->json($answer);
    }
}
