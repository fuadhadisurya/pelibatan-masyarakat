<?php

namespace App\Http\Controllers\admin_dashboard\peserta\kelasku;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Sertifikat;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SertifikatController extends Controller
{
    public function index($kelas_id){
        $kelas = Kelas::findOrFail($kelas_id);
        $testimoni = Testimoni::where('kelas_id', $kelas_id)->where('user_id', Auth::user()->id)->first();
        if($testimoni != null){
            return view('admin_dashboard.peserta.kelasku.sertifikat.index', ['kelas' => $kelas]);
        } else {
            return redirect()->route('peserta.kelasku.testimoni.create', [$kelas_id]);
        }
    }

    public function store(Request $request, $kelas_id){
        $data = '';
        
        $data['kelas_id'] = $kelas_id;
        $data['user_id'] = Auth::user()->id;
        $data['kode_sertifikat'] = Str::random(12);
        dd($data);
        Post::create($data);
        
        return redirect()->route('tutor.kelasku.forum.index', $kelas_id)->with('status', 'Forum diskusi berhasil dibuat');
    }
}
