<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManfaatPaket extends Model
{
    use HasFactory;
    protected $table = 'manfaat_pakets'; // Nama tabel
    protected $fillable = ['name']; // Kolom yang dapat diisi

    /**
     * Relasi ke opsi_manfaats (One-to-Many).
     */
    public function opsiManfaats()
    {
        return $this->hasMany(OpsiManfaat::class, 'benefits_id');
    }
}
