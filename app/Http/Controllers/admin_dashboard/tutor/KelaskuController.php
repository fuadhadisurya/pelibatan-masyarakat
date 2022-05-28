<?php

namespace App\Http\Controllers\admin_dashboard\tutor;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KelaskuController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Kelas::where('tutor_id', Auth::user()->id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('periode_kelas', function($row){
                        return $row->tanggal_berakhir . ' - ' . $row->tanggal_berakhir;
                    })
                    ->editColumn('status', function($row){
                        if($row->status == 'Persiapan'){
                            $status = '<span class="badge badge-warning">Persiapan</span>';
                        }elseif($row->status == 'Pendaftaran'){
                            $status = '<span class="badge badge-success">Pendaftaran</span>';
                        } elseif($row->status == 'Proses Seleksi'){
                            $status = '<span class="badge badge-info">Proses Seleksi</span>';
                        } elseif($row->status == 'Kegiatan Berlangsung'){
                            $status = '<span class="badge badge-primary">Kegiatan Berlangsung</span>';
                        } else {
                            $status = '<span class="badge badge-dark">Selesai</span>';
                        }
                        return '<td class="text-center">'. $status .'</td>';
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                            <a href="'. route('tutor.kelasku.home.index', $row->id) .'" class="btn btn-sm btn-info" title="Lihat"><i class="far fa-eye"></i></a>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'status'])
                    ->make(true);
        }
        
        return view("admin_dashboard.tutor.kelasku.index");
    }
}
