<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePelanggan extends Model
{
    use HasFactory;
    protected $table = 'tipe_pelanggans';
    protected $fillable = [ 'name','age','description'];
    // Cast tipe_perjalanan_id ke array
    protected $casts = [
        'age' => 'array',
    ];
}
