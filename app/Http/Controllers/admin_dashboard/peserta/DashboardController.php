<?php

namespace App\Http\Controllers\admin_dashboard\peserta;

use App\Http\Controllers\Controller;
use App\Models\RegistrasiEvent;
use App\Models\RegistrasiKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $kelasku = RegistrasiKelas::with('kelas')->where('user_id', Auth::user()->id)->where('status', 'Diterima')->orderBy('id', 'desc')->limit(5)->get();
        $eventku = RegistrasiEvent::with('event')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->limit(5)->get();
        return view('admin_dashboard.peserta.dashboard', ['kelasku' => $kelasku, 'eventku' => $eventku]);
    }
}
