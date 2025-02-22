<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiManfaat extends Model
{
    protected $table = 'opsi_manfaats';


    protected $fillable = [
        'benefits_id',
        'name'
    ];
}
