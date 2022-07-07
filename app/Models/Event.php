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

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_event', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });

        $query->when($filters['sort'] ?? false, function($query, $sort){
            if($sort == "Event Terbaru"){
                return $query->orderBy('id', 'desc');
            } elseif($sort == "Segera Berakhir"){
                return $query->orderBy('deadline_pendaftaran', 'asc');
            }
        });

        // $query->when($filters['category'] ?? false, function($query, $category){
        //     return $query->whereHas('kelasKategori', function($query) use ($category){
        //         $data = $query->where('TK_PAUD', 1);
        //         dd($data->get());
        //     });
        // });
    }

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
