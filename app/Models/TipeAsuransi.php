<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeAsuransi extends Model
{
    use HasFactory;
    protected $table = 'tipe_asuransis';
    protected $fillable = ['tipe_perjalanan_id', 'name'];
    // Cast tipe_perjalanan_id ke array
    protected $casts = [
        'tipe_perjalanan_id' => 'array',
    ];
}
