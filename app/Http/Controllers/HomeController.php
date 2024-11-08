<?php

namespace App\Http\Controllers;

use App\Models\WebHomes;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index($slug)
    {
        $data1 = WebHomes::with('gambar')->where('slug',$slug)->first();
        $homes = WebHomes::withcount('gambar')->orderby('id','desc')->where('id','!=',$data1->id)->get();
        return view('welcome', compact('data1','home'));
    }
}
