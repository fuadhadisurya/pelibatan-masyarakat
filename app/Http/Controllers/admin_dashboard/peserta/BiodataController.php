<?php

namespace App\Http\Controllers\admin_dashboard\peserta;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class BiodataController extends Controller
{
    public function index(){
        $response = Http::get('http://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provinsi = $response->json();
        $peserta = User::where('id', Auth::user()->id)->first();
        return view('admin_dashboard.peserta.biodata.index', ['provinsi' => $provinsi, 'peserta' => $peserta]);
    }

    public function update(){

    }

    public function akun(){
        return view('admin_dashboard.profil.akun');
    }
}
