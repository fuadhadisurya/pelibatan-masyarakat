<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";

    protected $fillable = [
        "nama_kelas", 
        "tanggal_mulai",
        "tanggal_berakhir",
        "deskripsi",
        "tutor_id",
        "status",
    ];

    public function tutor(){
        return $this->belongsTo(User::class);
    }

    public function kelasKategori(){
        return $this->hasOne(KelasKategori::class);
    }
}
