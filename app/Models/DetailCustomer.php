<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCustomer extends Model
{
    protected $table = 'detail_customers';


    protected $fillable = [
            'pesanan_id',
            'fullname',
            'gender',
            'date_od_birth',
            'place_of_birth',
            'no_passport',
            'pekerjaan',
            'home_address',
            'province',
            'kota',
            'post_code',
            'email',
            'phone_number',
            'url_photoId',
            'url_photoPassport',
            'is_polish',
    ];


}
