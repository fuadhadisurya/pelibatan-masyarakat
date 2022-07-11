<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Silabus extends Model
{
    use HasFactory;

    protected $table = "silabus";

    protected $fillable = [
        "user_id",
        "nama_silabus", 
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function bab(){
        return $this->hasMany(SilabusBab::class);
    }
}
