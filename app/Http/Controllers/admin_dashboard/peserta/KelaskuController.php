<?php

namespace App\Http\Controllers\admin_dashboard\peserta;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KelaskuController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Kelas::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('periode_kelas', function($row){
                        return $row->tanggal_berakhir . ' - ' . $row->tanggal_berakhir;
                    })
                    ->addColumn('tutor', function($row){
                        return $row->tutor->nama;
                    })
                    ->editColumn('status', function($row){
                        if($row->status == 'Pendaftaran'){
                            $status = '<span class="badge badge-success">Pendaftaran</span>';
                        } elseif($row->status == 'Proses Seleksi'){
                            $status = '<span class="badge badge-warning">Proses Seleksi</span>';
                        } elseif($row->status == 'Kegiatan Berlangsung'){
                            $status = '<span class="badge badge-danger">Proses Seleksi</span>';
                        } else {
                            $status = '<span class="badge badge-dark">Selesai</span>';
                        }
                        return '<td class="text-center">'. $status .'</td>';
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'. route('peserta.kelasku.home.index', $row->id) .'" class="btn btn-sm btn-info" title="Edit"><i class="far fa-eye"></i></a>
                                <a href="'. route('peserta.kelasku.home.index', $row->id) .'" class="btn btn-sm btn-light" title="Edit"><i class="bi bi-patch-check-fill"></i></a>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'status'])
                    ->make(true);
        }
        
        return view("admin_dashboard.peserta.kelasku.index");
    }
}
