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
        $data = Webabouts::withcount('image')->orderby('id','desc')->paginate(5);
        return view('admin.about.index', compact('data'));
    }

    public function create()
    {
      return view('admin.about.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $arr_image) {
                $allowed = array('png', 'jpg', 'jpeg');
                if (!in_array($arr_image->extension(), $allowed)) {
                  return back()->with('notif', json_encode([
                    'title' => "about",
                    'text' => "Gagal menambah about, format foto tidak diizinkan.",
                    'type' => "error"
                  ]));
                }
            }
        }

        try {
            $slug = Str::slug($request->judul);

            $nama = Webabouts::where('slug', $slug)->count();
            if ($nama > 0) {
                return back()->with('notif', json_encode([
                    'title' => "about",
                    'text' => "Gagal menambah about, judul about sudah terdaftar",
                    'type' => "warning"
                ]));
            }

            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')[0]->store('about-img/');
            }

            $about = Webabouts::create([
                "judul" => $request->judul,
                "slug" => $slug,
                "desk" => $request->desk,
                "foto" => $foto,
                "iduser" => auth::user()->id
            ]);

            WebAboutsGambar::create([
                'idabouts' => $about->id,
                'file' => $foto,
                'urut' => 0
            ]);

            if($request->hasFile('image')) {
                foreach($request->file('image') as $key => $arr_image){
                    if ($key == 0) {
                      continue;
                    }

                    $judulfoto = md5($arr_image->getRealPath().microtime()).'.'.$arr_image->extension();
                    $foto = $arr_image->store('about-img/');
                    WebAboutsGambar::create([
                        'idabouts' => $about->id,
                        'file' => $foto,
                        'urut' => $key
                    ]);
                }
            }

            return redirect('admin/admin-about')->with('notif', json_encode([
                'title' => "about",
                'text' => "Berhasil menambah about.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "about",
                'text' => "Gagal menambah about, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function edit($id)
    {
        $data = Webabouts::with('image')->where('id',$id)->first();
        return view('admin.about.edit', compact('data'));
    }

    public function update(Request $request)
    {
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $arr_image) {
                $allowed = array('png', 'jpg', 'jpeg');
                if (!in_array($arr_image->extension(), $allowed)) {
                  return back()->with('notif', json_encode([
                    'title' => "about",
                    'text' => "Gagal mengubah about, format foto tidak diizinkan.",
                    'type' => "error"
                  ]));
                }
            }
        }

        try {
            $slug = Str::slug($request->judul);

            $nama = Webabouts::where('slug', $slug)->where('id', '!=', $request->id)->count();
            if ($nama > 0) {
                return back()->with('notif', json_encode([
                    'title' => "about",
                    'text' => "Gagal mengubah about, judul about sudah terdaftar",
                    'type' => "warning"
                ]));
            }

            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')[0]->store('about-img/');
            }

           $about  = Webabouts::where('id', $request->id)->update([
                "judul" => $request->judul,
                "slug" => $slug,
                "desk" => $request->desk,
                "foto" => $foto,
                "iduser" => auth::user()->id
            ]);

            // hapus foto lama
            $image_lama = WebAboutsGambar::where('idabouts', $request->id)->get();
            foreach ($image_lama as $key => $value) {
                WebAboutsGambar::where('id', $value->id)->delete();

                if (Storage::exists($value->file)) {
                    Storage::delete($value->file);
                }
            }

            WebAboutsGambar::create([
                'idabouts' => $request->id,
                'file' => $foto,
                'urut' => 0
            ]);

            if($request->hasFile('image')) {
                foreach($request->file('image') as $key => $arr_image){
                    if ($key == 0) {
                      continue;
                    }

                    $judulfoto = md5($arr_image->getRealPath().microtime()).'.'.$arr_image->extension();
                    $foto = $arr_image->store('about-img/');
                    WebAboutsGambar::create([
                        'idabouts' => $request->id,
                        'file' => $foto,
                        'urut' => $key
                    ]);
                }
            }

            return redirect('admin/admin-about')->with('notif', json_encode([
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
