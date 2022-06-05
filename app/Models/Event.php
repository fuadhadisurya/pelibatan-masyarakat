<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "event";

    protected $fillable = [
        "banner", 
        "nama_event", 
        "kategori",
        "pembuat_event",
        "tanggal_mulai",
        "tanggal_berakhir",
        "deskripsi",
        "lokasi",
        "deadline_pendaftaran",
        "kuota",
        "status",
    ];

    public function registasiEvent(){
        return $this->hasMany(RegistrasiEvent::class);
    }

    public function dokumentasi(){
        return $this->hasMany(Dokumentasi::class);
    }

    // public function presensi(){
    //     return $this->hasMany(Presensi::class);
    // }
}
