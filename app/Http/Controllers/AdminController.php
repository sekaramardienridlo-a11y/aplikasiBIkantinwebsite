<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;

class AdminController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        
        // Mengambil semua pesanan siswa beserta detail menunya
        $pesanans = Pesanan::with('menu')
            ->whereNotNull('id_menu')
            ->where('jumlah', '>', 0)
            ->orderBy('id_transaksi', 'desc')
            ->get();

        return view('admin.dashboard', compact('menus', 'pesanans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        if ($pesanan) {
            $pesanan->status = $request->status;
            $pesanan->save();
        }

        return back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}