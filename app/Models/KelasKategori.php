<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasKategori extends Model
{
    use HasFactory;

    protected $table = "kelas_kategori";

    protected $fillable = [
        "kelas_id",
        "TK_PAUD",
        "SD_MI",
        "SMP_MTS",
        "SMA_SMK_MA",
        "Mahasiswa",
        "Masyarakat_Umum",
        "ASN_Polri_TNI",
    ];

    public function Kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
