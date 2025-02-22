<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';


    protected $fillable = [
        'pricePac_id',
        'total_price',
        'durasi_perjalan',
        'jumlah_customer',
        'status',
    ];
}
