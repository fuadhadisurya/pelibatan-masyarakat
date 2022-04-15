<?php

namespace App\Http\Controllers\admin_dashboard\tutor\kelasku;

use App\Http\Controllers\Controller;
use App\Models\DataPresensi;
use App\Models\Kelas;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $kelas_id)
    {
        $presensi = Presensi::where('kelas_id', '=', $kelas_id)->get();
        if ($request->ajax()) {
            return DataTables::of($presensi)
                    ->addIndexColumn()
                    ->addColumn('nama', function($row){
                        $angka = 0;
                        $angka++;
                        return 'Kehadiran '.$angka;
                    })
                    ->addColumn('status', function($row){
                        $dataPresensi = DataPresensi::where('presensi_id', '=', $row->id)->where('user_id', '=', Auth::user()->id)->first();
                        if ($dataPresensi != null) {
                            return '<span class="badge badge-success">'.$dataPresensi->status.'</span>';
                        } else {
                            return '<span class="badge badge-warning">Belum Mengisi</span>';
                        }
                    })
                    ->addColumn('aksi', function($row){
                        $dataPresensi = DataPresensi::where('presensi_id', '=', $row->id)->where('user_id', '=', Auth::user()->id)->first();
                        if ($dataPresensi != null) {
                            $aksi = '
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#isiPresensi'.$row->id.'" disabled>
                                    <i class="far fa-file-alt"></i>
                                </button>
                            </td>';
                        } else {
                            $aksi = '
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#isiPresensi'.$row->id.'">
                                    <i class="far fa-file-alt"></i>
                                </button>
                            </td>';
                        }
                        return $aksi;
                    })
                    ->rawColumns(['aksi', 'nama', 'status'])
                    ->make(true);
        }
        $kelas = Kelas::findOrfail($kelas_id);
        return view('admin_dashboard.tutor.kelasku.presensi.index', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'presensi' => $presensi]);
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
    public function store(Request $request, $kelas_id)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        DataPresensi::create($data);

        return redirect()->route('tutor.kelasku.presensi.index', [$kelas_id])->with('status', 'Berhasil mengisi presensi');
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
