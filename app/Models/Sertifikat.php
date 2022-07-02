<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = "sertifikat";

    protected $fillable = [
        "kelas_id", 
        "user_id", 
        "kode_sertifikat",
        "status",
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
