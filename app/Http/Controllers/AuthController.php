<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        if ($user = Auth::user()) {
            if ($user->jabatan_id == '1') {
                return redirect()->intended('home');
            } elseif ($user->jabatan_id == '2') {
                // return redirect()->intended('editor');
                return redirect()->intended('home1');
            }
        }
        return view('layouts.auth.login');
    }

    function login(Request $request)
    {
        $cek = User::where('username', $request->username)->where('is_aktif', 'aktif')->get()->count();

        if ($cek == 0) {
            return response()->json(['msg' => 'User Tidak Aktif']);
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->jabatan_id == 1 && Auth::user()->is_aktif == 'aktif') {
                return redirect()->intended('home');
                // User::where('id', Auth::user()->id)->update(['last_login' => Carbon::now()]);
                // return response()->json(['msg' => 'Login Berhasil '.$request->username.'', 'error' => false]);
            } else {
                return response()->json(['msg' => 'Login Gagal', 'error' => false]);
            }


        } else {
            return response()->json(['msg' => 'Tidak Ada Data', 'error' => true]);
        }
        // request()->validate(
        //     [
        //         'username' => 'required',
        //         'password' => 'required',
        //     ]);

        // $kredensil = $request->only('username','password');

        //     if (Auth::attempt($kredensil)) {
        //         $user = Auth::user();
        //         if ($user->jabatan_id == '1') {
        //             return redirect()->intended('home');
        //         } elseif ($user->jabatan_id == '2') {
        //             return redirect()->intended('home1');
        //         }
        //         return redirect()->intended('/');
        //     }

        // return redirect('/')
        //                         ->withInput()
        //                         ->withErrors(['login_gagal' => 'These credentials do not match our records.']);

    }

    function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
