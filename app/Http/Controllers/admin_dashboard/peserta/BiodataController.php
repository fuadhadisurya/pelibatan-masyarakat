<?php

namespace App\Http\Controllers\admin_dashboard\peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BiodataController extends Controller
{
    public function index(){
        $response = Http::get('http://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provinsi = $response->json();
        return view('admin_dashboard.peserta.biodata.index', ['provinsi' => $provinsi]);
    }

    public function update(){

    }
}
