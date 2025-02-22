<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailManfaat extends Model
{
    use HasFactory;
    protected $table = 'detail_manfaats';
    protected $fillable = ['benefitOption', 'insurance_type_id', 'destionation_id', 'price'];

    protected $casts = [
        'destionation_id' => 'array', // Mengubah JSON ke array otomatis
    ];

    // Relasi ke Paket Asuransi
    public function paketAsuransi()
    {
        return $this->belongsTo(PaketAsuransi::class, 'insurance_type_id');
    }

    // Relasi ke Opsi Manfaat
    public function opsiManfaat()
    {
        return $this->belongsTo(OpsiManfaat::class, 'benefitOption');
    }

    public function wilayahs()
    {
        // Pastikan destionation_id dalam bentuk array
    $destinationIds = is_array($this->destionation_id) ? $this->destionation_id : json_decode($this->destionation_id, true);

    // Jika tetap string atau null, ubah ke array kosong
    if (!is_array($destinationIds)) {
        $destinationIds = [];
    }

    return Wilayah::whereIn('id', $destinationIds)->get();
    }
}
