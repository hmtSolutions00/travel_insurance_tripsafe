<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManfaatPaket extends Model
{
    protected $table = 'manfaat_pakets';


    protected $fillable = [
        'name'
    ];
}
