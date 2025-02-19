<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    // protected $table = 'wilayah'; // Jika ingin menggunakan nama tabel 'wilayah' (bukan 'wilayahs')

    protected $fillable = [
        'name',
        'exclude',
        'include',
        'status',
    ];
}
