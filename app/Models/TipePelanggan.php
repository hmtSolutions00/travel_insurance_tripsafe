<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePelanggan extends Model
{
    protected $table = 'tipe_pelanggans';


    protected $fillable = [
       'name',
        "age",
        "description",
        "tipe_perjalan_id",
    ];
}
