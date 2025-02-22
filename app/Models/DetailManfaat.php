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

    protected $casts = [
        'destionation_id' => 'array', // Cast JSON ke array
    ];

    // Relasi ke tabel opsi_manfaats
    public function opsiManfaat()
    {
        return $this->belongsTo(OpsiManfaat::class, 'benefitOption');
    }

    // Relasi ke tabel paket_asuransis
    public function paketAsuransi()
    {
        return $this->belongsTo(PaketAsuransi::class, 'insurance_type_id');
    }

    // Relasi ke tabel wilayahs (dalam bentuk JSON array)
    public function wilayahs()
    {
        return Wilayah::whereIn('id', $this->destionation_id)->get();
    }
}
