<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class ApiController extends Controller
{
    public function bringCountries()
    {
        $countries = Country::get();

        return response()->json($countries);
    }
}
