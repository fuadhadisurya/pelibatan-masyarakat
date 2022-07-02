<?php

namespace App\Http\Controllers\admin_dashboard\tutor;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index(){
        $kelasku = Kelas::where('tutor_id', Auth::user()->id)->orderBy('id', 'desc')->limit(5)->get();
        return view('admin_dashboard.tutor.Dashboard', ['kelasku' => $kelasku]);
    }
}
