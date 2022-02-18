<?php

namespace App\Http\Controllers\admin_dashboard\peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index(){
        return view('admin_dashboard.peserta.biodata.index');
    }

    public function update(){

    }
}
