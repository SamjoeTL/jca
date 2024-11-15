<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Support\Str;
use App\Models\Webabouts;
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
        $data = Webabouts::all();
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

            $about = Webabouts::create([
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
                'title' => "Abouts",
                'text' => "Berhasil menambah content abouts.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "Abouts",
                'text' => "Gagal menambah content abouts, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function edit($id)
    {
        $data = Webabouts::where('id',$id)->first();
        return view('admin.about.edit', compact('data'));
    }

    public function update(Request $request)
    {


        try {

            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')->store('about-img');
            }

           $about  = Webabouts::where('id', $request->id)->update([
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
              'title' => "about",
              'text' => "Berhasil mengubah about.",
              'type' => "success"
            ]));
        } catch (\Exception $e) {
          return back()->with('notif', json_encode([
            'title' => "about",
            'text' => "Gagal mengubah about, ". $e->getMessage(),
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
            Webabouts::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "about",
                'text' => "Berhasil menghapus about",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "about",
                'text' => "Gagal menghapus about, " . $e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
