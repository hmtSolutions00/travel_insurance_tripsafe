<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $table = 'social_media'; // Nama tabel di database

    protected $fillable = [
        'name',
        'link',
        'icon',
        'status',
    ];
}
