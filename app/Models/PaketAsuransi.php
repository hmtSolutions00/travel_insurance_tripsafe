<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketAsuransi extends Model
{
    protected $table = 'paket_asuransis';


    protected $fillable = [
        'nama_paket',
    ];
}
