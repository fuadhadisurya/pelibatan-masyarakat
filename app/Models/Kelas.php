<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";

    protected $fillable = [
        "banner", 
        "nama_kelas", 
        "tanggal_mulai",
        "tanggal_berakhir",
        "persyaratan",
        "deskripsi",
        "tutor_id",
        "status",
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_kelas', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });

        $query->when($filters['sort'] ?? false, function($query, $sort){
            if($sort == "Terbaru"){
                return $query->orderBy('created_at', 'desc');
            } elseif($sort == "Terlama"){
                return $query->orderBy('created_at', 'asc');
            }
        });

        // $query->when($filters['category'] ?? false, function($query, $category){
        //     return $query->whereHas('kelasKategori', function($query) use ($category){
        //         $data = $query->where('TK_PAUD', 1);
        //         dd($data->get());
        //     });
        // });
    }

    public function tutor(){
        return $this->belongsTo(User::class);
    }

    public function kelasKategori(){
        return $this->hasOne(KelasKategori::class);
    }

    public function quiz(){
        return $this->hasMany(Quiz::class);
    }

    public function registasiKelas(){
        return $this->hasMany(RegistrasiKelas::class);
    }

    public function presensi(){
        return $this->hasMany(Presensi::class);
    }
}
