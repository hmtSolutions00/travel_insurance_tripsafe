<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteConfig extends Model
{
    use HasFactory;
    protected $table = 'website_configs'; // Nama tabel yang digunakan

    protected $fillable = [
        'site_name',
        'logo',
        'about_us',
        'url_photo_background',
        'title',
        'keywords',
        'slogan1',
        'slogan2',
    ];
}
