<?php

namespace App\Http\Controllers\admin_dashboard\tutor;

use App\Http\Controllers\Controller;
use App\Models\RegistrasiKelas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kelas, Request $request)
    {
        if ($request->ajax()) {
            $data = RegistrasiKelas::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user.nama', function($row){
                        return $row->user->nama;
                    })
                    ->addColumn('user.ttl', function($row){
                        return $row->user->tempat_lahir. ',' .$row->user->tanggal_lahir;
                    })
                    ->addColumn('user.tipe_anggota', function($row){
                        return $row->user->tipe_anggota;
                    })
                    ->addColumn('user.nomor_telepon', function($row){
                        return $row->user->nomor_telepon;
                    })
                    ->addColumn('user.alamat', function($row){
                        return $row->user->alamat. ' , ' .$row->user->desa_kelurahan. ' , ' .$row->user->kecamatan. ' , ' .$row->user->kabupaten_kota. ' , ' .$row->user->provinsi;
                    })
                    ->editColumn('status', function($row){
                        if($row->status == 'Diterima'){
                            $status = '<span class="badge badge-success">Diterima</span>';
                        } elseif($row->status == 'Ditolak'){
                            $status = '<span class="badge badge-danger">Ditolak</span>';
                        } else {
                            $status = '<span class="badge badge-warning">Belum Diproses</span>';
                        }
                        return '<td class="text-center">'. $status .'</td>';
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihat'.$row->id.'" title="Lihat">
                                        <i class="far fa-file-alt"></i>
                                </button>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'status'])
                    ->make(true);
        }
        $dataPeserta = RegistrasiKelas::where('kelas_id', $kelas)->get();
        
        return view('admin_dashboard.tutor.data_peserta.index', ['kelas' => $kelas, 'dataPeserta' => $dataPeserta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
