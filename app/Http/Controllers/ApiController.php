<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $user = User::select('account')
                    ->where('account', $request->username)
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
}
