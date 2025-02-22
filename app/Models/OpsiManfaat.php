<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiManfaat extends Model
{
    use HasFactory;
    protected $table = 'opsi_manfaats'; // Nama tabel
    protected $fillable = ['benefits_id', 'name']; // Kolom yang dapat diisi

    /**
     * Relasi ke manfaat_pakets (Many-to-One).
     */
    public function manfaatPaket()
    {
        return $this->belongsTo(ManfaatPaket::class, 'benefits_id');
    }
}
