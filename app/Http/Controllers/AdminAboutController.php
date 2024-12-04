<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Support\Str;
use App\Models\WebAbouts;
use Illuminate\Http\Request;
use App\Models\WebAboutsGambar;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
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
        $data = WebAbouts::all();
        return view('admin.about.index', compact('data'));
    }

    public function create()
    {
      return view('admin.about.create');
    }

    public function store(Request $request)
    {

        try {
            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')->store('about-img');
            }

            $about = WebAbouts::create([
                "judul" => $request->judul,
                "judul_en" => $request->judul_en,
                "subjudul" => $request->subjudul,
                "subjudul_en" => $request->subjudul_en,
                "desk" => $request->desk,
                "desk_en" => $request->desk_en,
                "foto" => $foto,
                "status" => $request->status,
                "position" => $request->position,
                "iduser" => auth::user()->id
            ]);

            return redirect('admin/about')->with('notif', json_encode([
                'title' => "ABOUT",
                'text' => "Berhasil menambah content about.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "ABOUT",
                'text' => "Gagal menambah content about, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function edit($id)
    {
        $data = WebAbouts::where('id',$id)->first();
        return view('admin.about.edit', compact('data'));
    }

    public function update(Request $request)
    {


        try {

            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')->store('about-img');
            }

           $about  = WebAbouts::where('id', $request->id)->update([
                "judul" => $request->judul,
                "judul_en" => $request->judul_en,
                "subjudul" => $request->subjudul,
                "subjudul_en" => $request->subjudul_en,
                "desk" => $request->desk,
                "desk_en" => $request->desk_en,
                "foto" => $foto,
                "status" => $request->status,
                "position" => $request->position,
                "iduser" => auth::user()->id
            ]);

            return redirect('admin/about')->with('notif', json_encode([
              'title' => "ABOUT",
              'text' => "Berhasil mengubah content about.",
              'type' => "success"
            ]));
        } catch (\Exception $e) {
          return back()->with('notif', json_encode([
            'title' => "ABOUT",
            'text' => "Gagal mengubah content about, ". $e->getMessage(),
            'type' => "error"
          ]));
        }
    }

    public function delete(Request $request)
    {
        try {
            $foto_lama = WebAboutsGambar::where('idabouts', $request->id)->get();
            foreach ($foto_lama as $key => $value) {
              if (Storage::exists($value->file)) {
                Storage::delete($value->file);
              }
            }
            WebAboutsGambar::where('idabouts', $request->id)->delete();
            WebAbouts::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "ABOUT",
                'text' => "Berhasil menghapus content about",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "ABOUT",
                'text' => "Gagal menghapus content about, " . $e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
