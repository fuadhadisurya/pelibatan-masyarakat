<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPresensi extends Model
{
    use HasFactory;

    protected $table = "data_presensi";

    protected $fillable = [
        "presensi_id", 
        "users_id",
        "status",
    ];
    
    public function presensi(){
        return $this->belongsTo(Presensi::class);
    }
}
