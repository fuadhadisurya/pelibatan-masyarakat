<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SilabusBab extends Model
{
    use HasFactory;

    protected $table = "silabus_bab";

    protected $fillable = [
        "silabus_id",
        "nama_bab", 
        "tanggal",
    ];

    public function silabus(){
        return $this->belongsTo(Silabus::class);
    }

    public function subbab(){
        return $this->hasMany(SilabusSubbab::class);
    }
}
