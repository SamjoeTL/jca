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
        $data = Webhomes::all();
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

            $home = Webhomes::create([
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
                'title' => "homes",
                'text' => "Berhasil menambah content homes.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "homes",
                'text' => "Gagal menambah content homes, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function edit($id)
    {
        $data = Webhomes::where('id',$id)->first();
        return view('admin.home.edit', compact('data'));
    }

    public function update(Request $request)
    {


        try {

            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')->store('home-img');
            }

           $home  = Webhomes::where('id', $request->id)->update([
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
              'title' => "home",
              'text' => "Berhasil mengubah home.",
              'type' => "success"
            ]));
        } catch (\Exception $e) {
          return back()->with('notif', json_encode([
            'title' => "home",
            'text' => "Gagal mengubah home, ". $e->getMessage(),
            'type' => "error"
          ]));
        }
    }

    public function delete(Request $request)
    {
        try {
            $foto_lama = WebhomesGambar::where('idhomes', $request->id)->get();
            foreach ($foto_lama as $key => $value) {
              if (Storage::exists($value->file)) {
                Storage::delete($value->file);
              }
            }
            WebhomesGambar::where('idhomes', $request->id)->delete();
            Webhomes::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "home",
                'text' => "Berhasil menghapus home",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "home",
                'text' => "Gagal menghapus home, " . $e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
