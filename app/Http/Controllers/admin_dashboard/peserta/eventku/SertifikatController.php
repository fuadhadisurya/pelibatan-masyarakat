<?php

namespace App\Http\Controllers\admin_dashboard\peserta\eventku;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SertifikatController extends Controller
{
    public function index($kelas_id){
        $event = Event::findOrFail($kelas_id);
        return view('admin_dashboard.peserta.eventku.sertifikat.index', ['event' => $event]);
        // $testimoni = Testimoni::where('kelas_id', $kelas_id)->where('user_id', Auth::user()->id)->first();
        // if($testimoni != null){
        //     return view('admin_dashboard.peserta.kelasku.sertifikat.index', ['kelas' => $event]);
        // } else {
        //     return redirect()->route('peserta.kelasku.testimoni.create', [$kelas_id]);
        // }
    }

    public function store(Request $request, $kelas_id){
        $data = '';
        
        $data['kelas_id'] = $kelas_id;
        $data['user_id'] = Auth::user()->id;
        $data['kode_sertifikat'] = Str::random(12);
        dd($data);
        Post::create($data);
        
        return redirect()->route('tutor.eventku.forum.index', $kelas_id)->with('status', 'Forum diskusi berhasil dibuat');
    }
}
