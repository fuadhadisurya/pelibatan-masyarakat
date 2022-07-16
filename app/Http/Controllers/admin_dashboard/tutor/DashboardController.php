<?php

namespace App\Http\Controllers\admin_dashboard\tutor;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Presensi;
use App\Models\Quiz;
use App\Models\RegistrasiKelas;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        $class = $request->kelas ." ". $request->tahun;
        $tahun = $request->tahun;
        
        $kelas = Kelas::where('tutor_id', Auth::user()->id)->get();
        foreach ($kelas as $kela) {
            $namaKelas[] = preg_replace('~\\s+\\S+$~', "", $kela->nama_kelas);
        }
        $namaKelas = array_unique($namaKelas, SORT_REGULAR);

        if ($class == true && $tahun == true) {
            $cariKelas = Kelas::where('nama_kelas', $class)->whereYear('tanggal_mulai', $tahun)->first();
            $peserta = RegistrasiKelas::where('kelas_id', $cariKelas->id)
            ->whereHas('kelas', function($query) use ($tahun, $class){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', $tahun)
                ->where('nama_kelas', $class);
            })
            ->get();
            
            $lakilaki = RegistrasiKelas::where('kelas_id', $cariKelas->id)
            ->whereHas('kelas', function($query) use ($tahun, $class){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', $tahun)
                ->where('nama_kelas', $class);
            })
            ->whereHas('user', function($query){
                return $query->where('jenis_kelamin', 'Laki-laki');
            })
            ->get();
            
            $perempuan = RegistrasiKelas::where('kelas_id', $cariKelas->id)
            ->whereHas('kelas', function($query) use ($tahun,$class){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', $tahun)
                ->where('nama_kelas', $class);
            })
            ->whereHas('user', function($query){
                return $query->where('jenis_kelamin', 'Perempuan');
            })
            ->get();

            $presensi = Presensi::whereHas('kelas', function($query) use ($tahun, $class){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', $tahun)
                ->where('nama_kelas', $class);
            })
            ->where('kelas_id', $cariKelas->id)->orderBy('id', 'desc')->limit(3)->get();
            
            $tugas = Tugas::whereHas('kelas', function($query) use ($tahun, $class){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', $tahun)
                ->where('nama_kelas', $class);
            })

            ->where('kelas_id', $cariKelas->id)->orderBy('id', 'desc')->limit(3)->get();
            $quiz = Quiz::whereHas('kelas', function($query) use ($tahun, $class){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', $tahun)
                ->where('nama_kelas', $class);
            })
            ->where('kelas_id', $cariKelas->id)->orderBy('id', 'desc')->limit(3)->get();
        } else {
            $cariKelas = null;
            
            $peserta = RegistrasiKelas::whereHas('kelas', function($query){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', Carbon::now()->format('Y'));
            })
            ->get();
            
            $lakilaki = RegistrasiKelas::whereHas('kelas', function($query){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', Carbon::now()->format('Y'));
            })
            ->whereHas('user', function($query){
                return $query->where('jenis_kelamin', 'Laki-laki');
            })
            ->get();
            
            $perempuan = RegistrasiKelas::whereHas('kelas', function($query){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', Carbon::now()->format('Y'));
            })
            ->whereHas('user', function($query){
                return $query->where('jenis_kelamin', 'Perempuan');
            })
            ->get();

            $presensi = Presensi::whereHas('kelas', function($query) use ($tahun){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', Carbon::now()->format('Y'));
            })
            ->orderBy('id', 'desc')->limit(3)->get();

            $tugas = Tugas::whereHas('kelas', function($query) use ($tahun){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', Carbon::now()->format('Y'));
            })
            ->orderBy('id', 'desc')->limit(3)->get();

            $quiz = Quiz::whereHas('kelas', function($query) use ($tahun){
                return $query->where('tutor_id', Auth::user()->id)
                ->whereYear('tanggal_mulai', Carbon::now()->format('Y'));
            })
            ->orderBy('id', 'desc')->limit(3)->get();
        }
        
        $mengajar = Kelas::where('tutor_id', Auth::user()->id)->get();
        $kelasku = Kelas::where('tutor_id', Auth::user()->id)->orderBy('id', 'desc')->limit(3)->get();
        return view('admin_dashboard.tutor.dashboard', [
            'cariKelas' => $cariKelas, 
            'kelas' => $kelas, 
            'namaKelas' => $namaKelas, 
            'kelasku' => $kelasku, 
            'peserta' => $peserta, 
            'lakilaki' => $lakilaki, 
            'perempuan' => $perempuan, 
            'mengajar' => $mengajar, 
            'presensi' => $presensi, 
            'tugas' => $tugas, 
            'quiz' => $quiz
        ]);
    }
}
