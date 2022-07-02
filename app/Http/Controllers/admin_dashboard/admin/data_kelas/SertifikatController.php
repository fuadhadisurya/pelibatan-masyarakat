<?php

namespace App\Http\Controllers\admin_dashboard\admin\data_kelas;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\RegistrasiKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $kelas_id)
    {
        if ($request->ajax()) {
            $data = RegistrasiKelas::where('kelas_id', '=', $kelas_id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user.nama', function($row){
                        return $row->user->nama;
                    })
                    ->editColumn('sertifikat', function($row){
                        if($row->sertifikat == 'Terbit'){
                            $sertifikat = '<span class="badge badge-success">Diterima</span>';
                        } elseif($row->sertifikat == 'Tidak Terbit'){
                            $sertifikat = '<span class="badge badge-danger">Ditolak</span>';
                        } else {
                            $sertifikat = '<span class="badge badge-warning">Belum Diproses</span>';
                        }
                        return '<td class="text-center">'. $sertifikat .'</td>';
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'.route('data-kelas.sertifikat.show', [$row->kelas->id, $row->user->id]).'" class="btn btn-sm btn-info" title="Lihat">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'sertifikat'])
                    ->make(true);
        }
        $kelas = Kelas::findOrfail($kelas_id);
        $dataPeserta = RegistrasiKelas::where('kelas_id', $kelas_id)->get();
        
        return view('admin_dashboard.admin.data-kelas.sertifikat.index', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'dataPeserta' => $dataPeserta]);
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
    public function update(Request $request, $kelas_id, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $data = $request->all();
        $dataPeserta = RegistrasiKelas::findOrFail($id);
        $dataPeserta->update($data);

        return redirect()->route('tutor.kelasku.peserta.index', $kelas_id)->with('status', 'Data berhasil diperbarui');
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
