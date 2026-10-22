<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;

class AdminController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); //
        $pesanans = Pesanan::all(); //
        return view('admin.dashboard', compact('menus', 'pesanans')); //
    }

    // Tambah Menu Baru
    public function storeMenu(Request $request)
    {
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);
        return back()->with('success', 'Menu berhasil ditambahkan');
    }

    // Hapus Menu
    public function deleteMenu($id)
    {
        Menu::destroy($id);
        return back()->with('success', 'Menu berhasil dihapus');
    }

    // Update Status Pesanan ("Menunggu Konfirmasi" -> "Sedang Dimasak" -> "Siap Diambil" -> "Selesai")
    public function updateStatus(Request $request, $id)
    {
        Pesanan::where('id', $id)->update([
            'status' => $request->status
        ]);
        return back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}