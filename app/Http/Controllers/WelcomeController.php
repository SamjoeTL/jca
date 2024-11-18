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
        $home = WebHomes::with('gambar')->first();
        $about = WebAbouts::where('status',1)->get();
        $product = Product::where('status',1)->get();
        return view('welcome', compact('home','about','product'));
    }
}
