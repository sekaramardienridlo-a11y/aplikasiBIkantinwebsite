<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan'; // Menghubungkan ke tabel 'pesanan'
    protected $guarded = [];
    public $timestamps = false; //

    // Relasi ke tabel menu (opsional jika ada id_menu)
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}