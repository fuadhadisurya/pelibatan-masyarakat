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
        $class = $request->kelas;
        $tahun = $request->tahun;

        if ($class == true && $tahun == true) {
            $kelas = Kelas::whereYear('created_at', Carbon::now()->format('Y'))->get();
            $cariKelas = Kelas::where('nama_kelas', $class)->whereYear('created_at', Carbon::parse($tahun)->format('Y'))->first();
            $peserta = RegistrasiKelas::where('kelas_id', $cariKelas->id)->whereYear('created_at', Carbon::parse($tahun)->format('Y'))->get();
        } else {
            $kelas = Kelas::whereYear('created_at', Carbon::now()->format('Y'))->get();
            $peserta = RegistrasiKelas::whereYear('created_at', Carbon::now()->format('Y'))->get();
        }
        
        return view('admin_dashboard.admin.dashboard', ['kelas' => $kelas, 'peserta' => $peserta, 'cariKelas' =>$cariKelas]);
    }
}
