<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Product;
use App\Models\WebAbouts;
use App\Models\WebHomes;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function welcome()
    {
        $data1 = WebHomes::with('gambar')->first();
        $homes = WebHomes::withcount('gambar')->orderby('id','desc')->where('id','!=',$data1->id)->get();
        $data = WebAbouts::with('image')->first();
        $abouts = WebAbouts::withcount('image')->get();
        $data2 = Product::orderby('id','desc')->get();
        $Links = Link::all();
        return view('welcome')->with('data1', $data1)->with('data', $data)->with('data2', $data2)->with('links', $Links);

    }
}
