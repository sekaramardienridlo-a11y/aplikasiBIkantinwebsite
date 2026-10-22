<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu'; // Menghubungkan ke tabel 'menu'
    protected $guarded = [];
    public $timestamps = false; // Nonaktifkan jika tabel tidak memiliki kolom created_at/updated_at
}