<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $cek = User::where('username', $request->username)->where('is_aktif', 'aktif')->get()->count();

        if ($cek == 0) {
            return response()->json(['msg' => 'User Tidak Aktif']);
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->divisi_id == 1 && Auth::user()->is_aktif == 'aktif') {
                User::where('id', Auth::user()->id)->update(['last_login' => Carbon::now()]);

                return response()->json(['msg' => 'Login Berhasil', 'error' => false]);
            } else {
                return response()->json(['msg' => 'Login Gagal', 'error' => false]);
            }
        } else {
            return response()->json(['msg' => 'Tidak Ada Data', 'error' => true]);
        }
    }
}
