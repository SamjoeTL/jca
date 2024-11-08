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

    public function index(Request $request)
    {
        if ($request->kategori != 'semua'){
          $idkategori = ProductKategori::where('nama', $request->kategori)->first();
        } else {
            $idkategori = null;
        }
        $data2 = Product::when(!empty($idkategori), function ($query) use ($idkategori) {
            return $query->where('idkategori', $idkategori->id);
        })->paginate(9);
        $total = Product::count();
        $kategori = ProductKategori::withcount('Products')->get();
        return view('admin.product.index',compact('data2','kategori','total','idkategori'));
    }

    public function kategori(Request $request)
     {
       $term = trim($request->q);
       $data2s = ProductKategori::when(!empty($term), function ($query) use ($term) {
             return $query->where('nama', 'LIKE', '%'. $term .'%');
         })->get();
       $ta  = array();
       foreach ($data2s as $data2) {
           $ta[] = ['id' => $data2->id, 'text' => $data2->nama];
       }
       return response()->json($ta);
     }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
      try {
        $cekisi = Product::where('id',$request->isi)->count();
        if($cekisi > 0) {
            return back()->with('notif', json_encode([
                'title' => "product",
                'text' => "Gagal menambahkan data2".$request->isi.", isi sudah terdaftar",
                'type' => "warning"
            ]));
        }

        $slug = Str::slug($request->id);

        $gambar = '';
        if ($request->file('gambar') != null) {
            $gambar = $request->file('gambar')->store('product-img/'.$slug);
        }

        Product::create([
            'id' => $request->id,
            'idkategori' => $request->idkategori,
            'isi' => $request->isi,
            'slug' => $slug,
            'gambar' => $gambar,
            'iduser' => auth()->user()->id
        ]);

        return redirect('admin/product')->with('notif', json_encode([
            'title' => "product",
            'text' => "Berhasil menambahkan data2",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "product",
              'text' => "Gagal menambahkan data2, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function edit($id)
    {
        $kategori = ProductKategori::get();
        $data2 = Product::where('id', $id)->first();

        return view('admin.product.edit', compact('kategori','data2'));
    }

    public function update(Request $request)
    {
        try {
            $cekisi = Product::where('isi', $request->isi)->where('id', '!=', $request->id)->count();
            if($cekisi > 0) {
                return back()->with('notif', json_encode([
                    'title' => "product",
                    'text' => "Gagal mengubah data2".$request->isi.", kategori sudah terdaftar",
                    'type' => "warning"
                ]));
            }

            $slug = Str::slug($request->id);
            $gambar = Product::where('id',$request->id)->pluck('gambar')->first();

            if ($request->file('gambar') != null) {
                Storage::delete($gambar);
                $gambar = $request->file('gambar')->store('product-img/'.$slug);
            }

            Product::where('id',$request->id)->update([
                'id' => $request->id,
                'idkategori' => $request->idkategori,
                'isi' => $request->isi,
                'slug' => $slug,
                'gambar' => $gambar,
                'iduser' => auth()->user()->id
            ]);

            return redirect('admin/product')->with('notif', json_encode([
                'title' => "product",
                'text' => "Berhasil mengubah data2.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "product",
                'text' => "Gagal mengubah data2, ". $e->getMessage(),
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
                'title' => "product",
                'text' => "Berhasil menghapus data2.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "product",
                'text' => "Gagal menghapus Barang.".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function storekategori(Request $request)
    {
        try {
            $ceknama = ProductKategori::where('nama', $request->nama)->count();
            if ($ceknama > 0) {
                return back()->with('notif', json_encode([
                    'title' => "CATEGORY",
                    'text' => "Gagal menambah data2, kategori $request->nama sudah terdaftar",
                    'type' => "warning"
                ]));
            }

            ProductKategori::create([
                'nama' => $request->nama,
                'iduser' => Auth::user()->id
            ]);
            return back()->with('notif', json_encode([
                'title' => "CATEGORY",
                'text' => "Berhasil menambah data2 kategori $request->nama",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "CATEGORY",
                'text' => "Gagal menambah data2 kategori, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function getkategori($id)
    {
        $data2 = ProductKategori::where('id',$id)->first();
        return $data2;
    }

    public function updatekategori(Request $request) {
        try {
          $ceknama = ProductKategori::where('nama', $request->nama)->where('id', '!=', $request->id)->count();
          if ($ceknama != null) {
              return back()->with('notif', json_encode([
                  'title' => "CATEGORY",
                  'text' => "Gagal mengubah, kategori $request->nama sudah terdaftar",
                  'type' => "warning"
              ]));
          }

          ProductKategori::where('id', $request->id)->update([
            'nama' => $request->nama,
            'iduser' => Auth::user()->id
          ]);

          return back()->with('notif', json_encode([
              'title' => "CATEGORY",
              'text' => "Berhasil mengubah data2 kategori $request->nama.",
              'type' => "success"
          ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "CATEGORY",
                'text' => "Gagal mengubah data2, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
      }
}
