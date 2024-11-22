<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\WebAbouts;
use App\Models\WebHomes;
use App\Models\ProfilSosmed;
use App\Models\WebServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::all();
        $homes = WebHomes::all();
        $abouts = WebAbouts::all();// Ambil data dari model
        $sosmed = ProfilSosmed::all();
        $service = WebServices::get();
        return view('admin.dashboard', compact('products','homes', 'abouts','sosmed')); // Kirim ke view

    }

}
