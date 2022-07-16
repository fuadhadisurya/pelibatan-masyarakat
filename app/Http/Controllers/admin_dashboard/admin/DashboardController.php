<?php

namespace App\Http\Controllers\admin_dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\RegistrasiKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $class = $request->kelas ." ". $request->tahun;
        $tahun = $request->tahun;
        
        $kelas = Kelas::all();
        foreach ($kelas as $kela) {
            $namaKelas[] = preg_replace('~\\s+\\S+$~', "", $kela->nama_kelas);
        }
        $namaKelas = array_unique($namaKelas, SORT_REGULAR);

        if ($class == true && $tahun == true) {
            $cariKelas = Kelas::where('nama_kelas', $class)->whereYear('tanggal_mulai', Carbon::parse($tahun)->format('Y'))->first();
            $peserta = RegistrasiKelas::where('kelas_id', $cariKelas->id)
            ->whereHas('kelas', function($query) use ($tahun){
                return $query->whereYear('tanggal_mulai', $tahun);
            })
            ->get();
        } else {
            $cariKelas = null;
            $peserta = RegistrasiKelas::whereHas('kelas', function($query) use ($tahun){
                return $query->whereYear('tanggal_mulai', Carbon::now()->format('Y'));
            })->get();
        }
        
        return view('admin_dashboard.admin.dashboard', ['kelas' => $kelas, 'peserta' => $peserta, 'cariKelas' =>$cariKelas, 'namaKelas' => $namaKelas]);
    }
}
