<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketAsuransi extends Model
{
    use HasFactory;
    protected $table = 'paket_asuransis'; // Nama tabel di database

    protected $fillable = ['nama_paket'];
}
