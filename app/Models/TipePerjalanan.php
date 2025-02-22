<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TipePerjalanan extends Model
{
    protected $table = 'tipe_perjalanans'; // Nama tabel di database

    protected $fillable = ['name', 'description']; // Field yang bisa diisi
}
