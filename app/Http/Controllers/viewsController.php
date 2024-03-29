<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewsController extends Controller
{
    public function viewHome()
    {
        return view('/index');
    }

    public function viewLogin()
    {
        return view('/login');
    }

    public function viewRegister()
    {
        return view('/register');
    }

    public function viewPanelUser()
    {
        return view('/userPanel');
    }

    public function viewRanking()
    {
        return view('/ranking');
    }

    public function viewDownloads()
    {
        return view('/descargas');
    }
}
