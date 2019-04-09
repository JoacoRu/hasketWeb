<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Notice;

class NoticeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->new;
        $titulo = $request->titulo;
        $autor = Auth::user()->memb___id;
        if($autor !== 'balas16k') {
            return redirect('index');
        } else {
            Notice::create([
                'autor' => $autor, 
                'noticia' => $data, 
                'titulo' => $titulo
            ]);
            return redirect('index');
        }
    }

    public function list()
    {
        $news = Notice::all();
        return view('allNews', compact('news'));
    }

    public function byId($id)
    {   
        $news = Notice::where('id', $id)
                        ->get();
        return view('newById', compact('news'));
    }
}
