<?php

namespace App\Http\Controllers\admin_dashboard\peserta;

use App\Http\Controllers\Controller;
use App\Models\RegistrasiKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KelaskuController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = RegistrasiKelas::with('kelas')->where('user_id', Auth::user()->id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('periode_kelas', function($row){
                        return $row->kelas->tanggal_berakhir . ' - ' . $row->kelas->tanggal_berakhir;
                    })
                    ->addColumn('tutor', function($row){
                        return $row->kelas->tutor->nama;
                    })
                    ->editColumn('status', function($row){
                        if($row->kelas->status == 'Persiapan'){
                            $status = '<span class="badge badge-warning">Persiapan</span>';
                        }elseif($row->kelas->status == 'Pendaftaran'){
                            $status = '<span class="badge badge-success">Pendaftaran</span>';
                        } elseif($row->kelas->status == 'Proses Seleksi'){
                            $status = '<span class="badge badge-info">Proses Seleksi</span>';
                        } elseif($row->kelas->status == 'Kegiatan Berlangsung'){
                            $status = '<span class="badge badge-primary">Kegiatan Berlangsung</span>';
                        } else {
                            $status = '<span class="badge badge-dark">Selesai</span>';
                        }
                        return '<td class="text-center">'. $status .'</td>';
                    })
                    ->addColumn('aksi', function($row){
                        if ($row->kelas->status == "Selesai") {
                            return '
                                <td class="text-center">
                                    <a href="'. route('peserta.kelasku.home.index', $row->kelas->id) .'" class="btn btn-sm btn-info" title="Lihat"><i class="far fa-eye"></i></a>
                                    <a href="'. route('peserta.kelasku.home.index', $row->kelas->id) .'" class="btn btn-sm btn-light" title="Unduh Sertifikat"><i class="bi bi-patch-check-fill"></i></a>
                                </td>
                            ';   
                        } else {
                            return '
                                <td class="text-center">
                                    <a href="'. route('peserta.kelasku.home.index', $row->kelas->id) .'" class="btn btn-sm btn-info" title="Lihat"><i class="far fa-eye"></i></a>
                                </td>
                            ';   
                        }
                    })
                    ->rawColumns(['aksi', 'status'])
                    ->make(true);
        }
        
        return view("admin_dashboard.peserta.kelasku.index");
    }
}
