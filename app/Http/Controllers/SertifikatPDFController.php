<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;

class SertifikatPDFController extends Controller
{
    public function index()
    {
        $data = [
            // 'kode_sertifikat' => Str::upper(Str::random(12)),
            'nama' => Auth::user()->nama,
            'nama_kelas' => 'Kelas Basic Programming',
            'tanggal' => Carbon::now()->format('Y-m-d')
        ];
        
        $pdf = PDF::loadView('sertifikat/testPDF', $data)->setPaper('A4', 'landscape');
        
        // return $pdf->download('sertifikat.pdf');
        return $pdf->stream('sertifikat.pdf');
    }
}
