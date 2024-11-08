<?php

namespace App\Http\Controllers;


use App\Models\link;
use Illuminate\Http\Request;


class AdminLinkController extends Controller
{

    public function getLinkData()
    {
        $links = Link::all(['id', 'nama', 'pesan']); // Pastikan kolom yang dipilih benar
        return response()->json($links); // Mengembalikan data sebagai JSON
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.link.index');
    }

    public function dt()
    {
        $data3 = Link::all();
        $formattedData3 = $data3->map(function($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama,
                'pesan' => $item->pesan,
                'action' => '
                    <button type="button" value="'.$item->id.'" class="btn btn-sm btn-outline-warning waves-effect waves-float waves-light btnubah" data-toggle="modal" data-target="#modal-link">
                        <i data-feather="edit"></i> Ubah
                    </button>
                    <form class="d-inline btnhapus" action="'.route('admin.link.delete').'" method="post">
                        <input type="hidden" name="id" value="' . $item->id . '">
                        <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" name="button"><i data-feather="trash"></i> Hapus</button>
                        ' . csrf_field() . '
                    </form>
                ',
            ];
        });

        // Mengembalikan data dalam format JSON
        return response()->json($formattedData3);
    }


    public function store(Request $request)
    {
        try {
            link::create([
                'nama' => $request->nama,
                'pesan' => $request->pesan,
                'iduser' => auth()->user()->id
            ]);

            return back()->with('notif', json_encode([
                'title' => "link",
                'text' => "Berhasil menambahkan link",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "link",
                'text' => "Gagal menambahkan link, ".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function update(Request $request)
    {
        try {
            link::where('id', $request->id)->update([
                'nama' => $request->nama,
                'pesan' => $request->pesan,
                'iduser' => auth()->user()->id
            ]);

            return back()->with('notif', json_encode([
                'title' => "link",
                'text' => "Berhasil mengubah link",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "link",
                'text' => "Gagal mengubah link, ".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function delete(Request $request)
    {
        try {
            link::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "link",
                'text' => "Berhasil mengubah link",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "link",
                'text' => "Gagal menghapus link, " . $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

}
