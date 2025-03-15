<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodePromo extends Model
{
    protected $table = 'kode_promos';

    protected $fillable = [
        "kode_promo",
        "tanggal_mulai",
        "tanggal_akhir",
        "nama_promo",
        "detail"
    ];
}
