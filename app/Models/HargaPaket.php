<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaPaket extends Model
{
    protected $table = 'harga_pakets';


    protected $fillable = [
        "destionation_id",
        "package_id",
        "duration",
        "price",
        "insuranceType_id",
        "custAge_id",
        "extra_price",
        "product_name",
    ];
}
