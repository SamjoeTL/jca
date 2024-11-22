<?php

namespace App\Http\Controllers;

use App\Models\ProfilSosmed;
use Illuminate\Http\Request;

class AdminSosmedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sosmed = ProfilSosmed::get();
        return view('admin.sosmed.footer', compact('sosmed'));
    }

    public function storesosmed(Request $request)
    {
        try {
            if($request->jenis == 1) {
                $ket = 'FACEBOOK';
            } elseif($request->jenis == 2) {
                $ket = 'WHATSAPP';
            } elseif($request->jenis == 3) {
                $ket = 'INSTAGRAM';
            } elseif($request->jenis == 4) {
                $ket = 'YOUTUBE';
            }

            ProfilSosmed::create([
              'jenis' => $request->jenis,
              'link' => $request->link,
              'nama' => $request->nama
            ]);
            return back()->with('notif', json_encode([
                'title' => "$ket",
                'text' => "Berhasil menambah $ket",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
              'title' => "$ket",
              'text' => "Gagal menambah $ket. ".$e->getMessage(),
              'type' => "error"
            ]));
        }
    }

    public function getsosmed($id)
    {
        $data = ProfilSosmed::where('id',$id)->first();
        return $data;
    }

    public function updatesosmed(Request $request)
    {
        try {
            if($request->jenis == 1) {
                $ket = 'FACEBOOK';
            } elseif($request->jenis == 2) {
                $ket = 'WHATSAPP';
            } elseif($request->jenis == 3) {
                $ket = 'INSTAGRAM';
            } elseif($request->jenis == 4) {
                $ket = 'YOUTUBE';
            }

            ProfilSosmed::where('id',$request->id)->update([
              'jenis' => $request->jenis,
              'link' => $request->link,
              'nama' => $request->nama
            ]);
            return back()->with('notif', json_encode([
                'title' => "$ket",
                'text' => "Berhasil mengubah $ket",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
              'title' => "$ket",
              'text' => "Gagal mengubah $ket. ".$e->getMessage(),
              'type' => "error"
            ]));
        }
    }

    public function deletesosmed(Request $request)
    {
        try {
            if($request->jenis == 1) {
                $ket = 'FACEBOOK';
            } elseif($request->jenis == 2) {
                $ket = 'WHATSAPP';
            } elseif($request->jenis == 3) {
                $ket = 'INSTAGRAM';
            } elseif($request->jenis == 4) {
                $ket = 'YOUTUBE';
            }

            ProfilSosmed::where('id',$request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "$ket",
                'text' => "Berhasil menghapus $ket",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
              'title' => "$ket",
              'text' => "Gagal menghapus $ket. ".$e->getMessage(),
              'type' => "error"
            ]));
        }
    }
}
