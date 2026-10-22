<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = DB::table('siswa')
            ->where('nis', $username)
            ->where('password', $password)
            ->first();

        if ($user) {
            Session::put('user', $user);

            if (isset($user->role) && $user->role == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/siswa/dashboard');
            }
        }

        return back()->with('error', 'NIS atau Password salah!');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/login');
    }
}