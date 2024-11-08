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
        $data1 = Webhomes::withcount('gambar')->orderby('id','desc')->paginate(5);
        return view('admin.home.index', compact('data1'));
    }

    public function create()
    {
      return view('admin.home.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $key => $arr_gambar) {
                $allowed = array('png', 'jpg', 'jpeg');
                if (!in_array($arr_gambar->extension(), $allowed)) {
                  return back()->with('notif', json_encode([
                    'title' => "home",
                    'text' => "Gagal menambah home, format gambar tidak diizinkan.",
                    'type' => "error"
                  ]));
                }
            }
        }

        try {
            $slug = Str::slug($request->nama);

            $judul = Webhomes::where('slug', $slug)->count();
            if ($judul > 0) {
                return back()->with('notif', json_encode([
                    'title' => "home",
                    'text' => "Gagal menambah home, nama home sudah terdaftar",
                    'type' => "warning"
                ]));
            }

            $cover = '';
            if($request->hasFile('gambar')) {
                $cover = $request->file('gambar')[0]->store('home-img/');
            }

            $home = Webhomes::create([
                "nama" => $request->nama,
                "slug" => $slug,
                "deskripsi" => $request->deskripsi,
                "cover" => $cover,
                "iduser" => auth::user()->id
            ]);

            WebhomesGambar::create([
                'idhomes' => $home->id,
                'file' => $cover,
                'urut' => 0
            ]);

            if($request->hasFile('gambar')) {
                foreach($request->file('gambar') as $key => $arr_gambar){
                    if ($key == 0) {
                      continue;
                    }

                    $namagambar = md5($arr_gambar->getRealPath().microtime()).'.'.$arr_gambar->extension();
                    $gambar = $arr_gambar->store('home-img/');
                    WebhomesGambar::create([
                        'idhomes' => $home->id,
                        'file' => $gambar,
                        'urut' => $key
                    ]);
                }
            }

            return redirect('admin/admin-home')->with('notif', json_encode([
                'title' => "home",
                'text' => "Berhasil menambah home.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "home",
                'text' => "Gagal menambah home, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function edit($id)
    {
        $data1 = Webhomes::with('gambar')->where('id',$id)->first();
        return view('admin.home.edit', compact('data1'));
    }

    public function update(Request $request)
    {
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $key => $arr_gambar) {
                $allowed = array('png', 'jpg', 'jpeg');
                if (!in_array($arr_gambar->extension(), $allowed)) {
                  return back()->with('notif', json_encode([
                    'title' => "home",
                    'text' => "Gagal mengubah home, format gambar tidak diizinkan.",
                    'type' => "error"
                  ]));
                }
            }
        }

        try {
            $slug = Str::slug($request->nama);

            $judul = Webhomes::where('slug', $slug)->where('id', '!=', $request->id)->count();
            if ($judul > 0) {
                return back()->with('notif', json_encode([
                    'title' => "home",
                    'text' => "Gagal mengubah home, nama home sudah terdaftar",
                    'type' => "warning"
                ]));
            }

            $cover = '';
            if($request->hasFile('gambar')) {
                $cover = $request->file('gambar')[0]->store('home-img/');
            }

            $home = Webhomes::where('id', $request->id)->update([
                "nama" => $request->nama,
                "slug" => $slug,
                "deskripsi" => $request->deskripsi,
                "cover" => $cover,
                "iduser" => auth::user()->id
            ]);

            // hapus gambar lama
            $gambar_lama = WebhomesGambar::where('idhomes', $request->id)->get();
            foreach ($gambar_lama as $key => $value) {
                WebhomesGambar::where('id', $value->id)->delete();

                if (Storage::exists($value->file)) {
                    Storage::delete($value->file);
                }
            }

            WebhomesGambar::create([
                'idhomes' => $request->id,
                'file' => $cover,
                'urut' => 0
            ]);

            if($request->hasFile('gambar')) {
                foreach($request->file('gambar') as $key => $arr_gambar){
                    if ($key == 0) {
                      continue;
                    }

                    $namagambar = md5($arr_gambar->getRealPath().microtime()).'.'.$arr_gambar->extension();
                    $gambar = $arr_gambar->store('home-img/');
                    WebhomesGambar::create([
                        'idhomes' => $request->id,
                        'file' => $gambar,
                        'urut' => $key
                    ]);
                }
            }

            return redirect('admin/admin-home')->with('notif', json_encode([
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
            $gambar_lama = WebhomesGambar::where('idhomes', $request->id)->get();
            foreach ($gambar_lama as $key => $value) {
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
