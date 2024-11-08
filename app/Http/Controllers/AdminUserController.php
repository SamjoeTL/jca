<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function dt()
    {
        $data = User::get();
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '
              <form class="d-inline btnreset" action="'.route('admin.user.reset').'" method="post">
                <input type="hidden" name="id" value="' . $data->id . '">
                <input type="hidden" name="password" value="' . $data->username . '">
                <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" target="_blank" name="button"><i data-feather="refresh-ccw"></i> Reset Password</button>
                ' . csrf_field() . '
              </form>
            ';
        })
        ->make(true);
    }

    public function store(Request $request)
    {
        $username = User::where('username',$request->username)->count();
        if ($username > 0) {
            return back()->with('notif', json_encode([
            'title' => "USER",
            'text' => "Gagal manambah data".$request->nama.", username sudah terdaftar",
            'type' => "warning"
            ]));
        }

        try {
            $foto = '';
            if ($request->file('foto') != null) {
                $foto = $request->file('foto')->store('userimages');
            }

           User::create([
            'foto' => $foto,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(40),
           ]);

           return back()->with('notif', json_encode([
            'title' => "USER",
            'text' => "Berhasil menambah user",
            'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "BUAT USER",
                'text' => "Gagal menambah user".$e->getMessage(),
                'type' => "error"
              ]));
        }
    }

    //ubah password di admin
    public function reset(Request $request)
    {
        try {
           User::where('id',$request->id)->update([
            'password' => bcrypt($request->password),
           ]);

           return back()->with('notif', json_encode([
            'title' => "RESET PASSWORD",
            'text' => "Berhasil melakukan reset password",
            'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "RESET PASSWORD",
                'text' => "Gagal melakukan reset password".$e->getMessage(),
                'type' => "error"
              ]));
        }
    }

    //ubah password di user
    public function ubahpassword(Request $request)
    {
      try {
        if (Hash::check($request->passwordlama, Auth::user()->password)) {
          User::where('id',Auth::user()->id)->update([
            'password' => bcrypt($request->passwordbaru),
            'remember_token' => Str::random(40)
          ]);
        }else {
          return back()->with('notif', json_encode([
            'title' => "UBAH PASSWORD",
            'text' => "Password lama tidak sesuai.",
            'type' => "error"
          ]));
        }
        return back()->with('notif', json_encode([
          'title' => "USER",
          'text' => "Berhasil mengubah password. ",
          'type' => "success"
      ]));
      } catch (\Exception $e) {
        return back()->with('notif', json_encode([
          'title' => "USER",
          'text' => "Gagal mengubah password. ".$e->getMessage(),
          'type' => "error"
        ]));
      }

    }


}
