<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
      try {
        $gambar = '';
        if ($request->file('gambar') != null) {
            $gambar = $request->file('gambar')->store('product-img');
        }

        $file = '';
        if ($request->file('files') != null) {
            $file = $request->file('files')->storeAs('product-file',$request->file('files')->getClientOriginalName());
        }
        Product::create([
            'nama' => $request->nama,
            'nama_en' => $request->nama_en,
            'desk' => $request->desk,
            'desk_en' => $request->desk_en,
            'gambar' => $gambar,
            'file' => $file,
            'iduser' => auth::user()->id
        ]);

        return redirect('admin/product')->with('notif', json_encode([
            'title' => "PRODUCT",
            'text' => "Berhasil menambahkan content product",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PRODUCT",
              'text' => "Gagal menambahkan content product, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function edit($id)
    {
        $data = Product::where('id', $id)->first();

        return view('admin.product.edit', compact('data'));
    }

    public function update(Request $request)
    {
        try {
            $data = Product::where('id',$request->id)->first();

            $gambar = $data->gambar;
            if ($request->file('gambar') != null) {
                Storage::delete($data->gambar);
                $gambar = $request->file('gambar')->store('product-img');
            }

            $file = $data->file;
            if ($request->file('files') != null) {
                $file = $request->file('files')->storeAs('product-file',$request->file('files')->getClientOriginalName());
            }



            Product::where('id',$request->id)->update([
                'nama' => $request->nama,
                'nama_en' => $request->nama_en,
                'desk' => $request->desk,
                'desk_en' => $request->desk_en,
                'gambar' => $gambar,
                'file' => $file,
                'iduser' => auth::user()->id
            ]);

            return redirect('admin/product')->with('notif', json_encode([
                'title' => "PRODUCT",
                'text' => "Berhasil mengubah content product.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "PRODUCT",
                'text' => "Gagal mengubah content product, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function delete(Request $request)
    {
        try {
            $gambar = Product::where('id',$request->id)->pluck('gambar')->first();
            Storage::delete($gambar);
            Product::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "PRODUCT",
                'text' => "Berhasil menghapus content product.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "PRODUCT",
                'text' => "Gagal menghapus content product.".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
