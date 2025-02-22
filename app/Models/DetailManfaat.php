<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailManfaat extends Model
{
    protected $table = 'detail_manfaats';


    protected $fillable = [
        'benefitOption',
        'insurance_type_id',
        'destionation_id',
        'price'
    ];
}
