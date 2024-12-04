<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Support\Str;
use App\Models\Webhomes;
use Illuminate\Http\Request;
use App\Models\WebhomesGambar;
use Illuminate\Support\Facades\Storage;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = WebHomes::all();
        return view('admin.home.index', compact('data'));
    }

    public function create()
    {
      return view('admin.home.create');
    }

    public function store(Request $request)
    {

        try {
            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')->store('home-img');
            }

            $home = WebHomes::create([
                "judul" => $request->judul,
                "judul_en" => $request->judul_en,
                "subjudul" => $request->subjudul,
                "subjudul_en" => $request->subjudul_en,
                "desk" => $request->desk,
                "desk_en" => $request->desk_en,
                "foto" => $foto,
                "status" => $request->status,
                "iduser" => auth::user()->id
            ]);

            return redirect('admin/home')->with('notif', json_encode([
                'title' => "HOME",
                'text' => "Berhasil menambah content home.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "HOME",
                'text' => "Gagal menambah content home, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function edit($id)
    {
        $data = WebHomes::where('id',$id)->first();
        return view('admin.home.edit', compact('data'));
    }

    public function update(Request $request)
    {


        try {

            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')->store('home-img');
            }

           $home  = WebHomes::where('id', $request->id)->update([
                "judul" => $request->judul,
                "judul_en" => $request->judul_en,
                "subjudul" => $request->subjudul,
                "subjudul_en" => $request->subjudul_en,
                "desk" => $request->desk,
                "desk_en" => $request->desk_en,
                "foto" => $foto,
                "status" => $request->status,
                "iduser" => auth::user()->id
            ]);

            return redirect('admin/home')->with('notif', json_encode([
              'title' => "HOME",
              'text' => "Berhasil mengubah content home.",
              'type' => "success"
            ]));
        } catch (\Exception $e) {
          return back()->with('notif', json_encode([
            'title' => "HOME",
            'text' => "Gagal mengubah content home, ". $e->getMessage(),
            'type' => "error"
          ]));
        }
    }

    public function delete(Request $request)
    {
        try {
            $foto_lama = WebHomesGambar::where('idhomes', $request->id)->get();
            foreach ($foto_lama as $key => $value) {
              if (Storage::exists($value->file)) {
                Storage::delete($value->file);
              }
            }
            WebHomesGambar::where('idhomes', $request->id)->delete();
            WebHomes::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "HOME",
                'text' => "Berhasil menghapus home",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "HOME",
                'text' => "Gagal menghapus home, " . $e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
