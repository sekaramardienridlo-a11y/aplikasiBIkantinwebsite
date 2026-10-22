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
    $menus = Menu::all();

    $pesanans = Pesanan::with('menu')
        ->where('nis', $user->nis ?? null)
        ->whereNotNull('id_menu')
        ->where('jumlah', '>', 0)
        ->orderBy('id_transaksi', 'desc')
        ->get();

    return view('siswa.dashboard', compact('menus', 'pesanans'));
}
public function storePesanan(Request $request)
{
    $user = Session::get('user');

    Pesanan::create([
        'nis' => $user->nis ?? null,
        'id_menu' => $request->menu_id,
        'id_kantin' => 1,
        'jumlah' => $request->jumlah,
        'status' => 'Menunggu Konfirmasi',
        'metode_bayar' => 'Tunai', // Menambahkan metode bayar default
        'tanggal' => date('Y-m-d H:i:s'),
    ]);

    return back()->with('success', 'Pesanan berhasil dibuat!');
}
}