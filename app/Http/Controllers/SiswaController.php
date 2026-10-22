<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        $menus = Menu::all(); //
        $pesanans = Pesanan::where('user_id', $user->id ?? null)->orWhere('username', $user->username ?? '')->get(); //
        return view('siswa.dashboard', compact('menus', 'pesanans')); //[cite: 1]
    }

    // Siswa Memesan[cite: 1]
    public function storePesanan(Request $request)
    {
        $user = Session::get('user');
        Pesanan::create([
            'username' => $user->username ?? 'Siswa',
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'status' => 'Menunggu Konfirmasi', // Status default[cite: 1]
        ]);
        return back()->with('success', 'Pesanan berhasil dibuat!');
    }
}