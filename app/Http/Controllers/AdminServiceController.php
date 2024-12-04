<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Support\Str;
use App\Models\Webservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
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
        $data = Webservices::all();
        return view('admin.service.index', compact('data'));
    }

    public function create()
    {
      return view('admin.service.create');
    }

    public function store(Request $request)
    {

        try {
            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')->store('service-img');
            }

            $service = Webservices::create([
                "judul" => $request->judul,
                "judul_en" => $request->judul_en,
                "desk" => $request->desk,
                "desk_en" => $request->desk_en,
                "foto" => $foto,
                "status" => $request->status,
                "iduser" => auth::user()->id
            ]);

            return redirect('admin/service')->with('notif', json_encode([
                'title' => "services",
                'text' => "Berhasil menambah content services.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "services",
                'text' => "Gagal menambah content services, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function edit($id)
    {
        $data = Webservices::where('id',$id)->first();
        return view('admin.service.edit', compact('data'));
    }

    public function update(Request $request)
    {


        try {

            $foto = '';
            if($request->hasFile('image')) {
                $foto = $request->file('image')->store('service-img');
            }

           $service  = Webservices::where('id', $request->id)->update([
                "judul" => $request->judul,
                "judul_en" => $request->judul_en,
                "desk" => $request->desk,
                "desk_en" => $request->desk_en,
                "foto" => $foto,
                "status" => $request->status,
                "iduser" => auth::user()->id
            ]);

            return redirect('admin/service')->with('notif', json_encode([
              'title' => "service",
              'text' => "Berhasil mengubah service.",
              'type' => "success"
            ]));
        } catch (\Exception $e) {
          return back()->with('notif', json_encode([
            'title' => "service",
            'text' => "Gagal mengubah service, ". $e->getMessage(),
            'type' => "error"
          ]));
        }
    }

    public function delete(Request $request)
    {
        try {


            Webservices::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "service",
                'text' => "Berhasil menghapus service",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "service",
                'text' => "Gagal menghapus service, " . $e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
