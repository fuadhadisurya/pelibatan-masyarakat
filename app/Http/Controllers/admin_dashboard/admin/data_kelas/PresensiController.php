<?php

namespace App\Http\Controllers\admin_dashboard\admin\data_kelas;

use App\Http\Controllers\Controller;
use App\Models\DataPresensi;
use App\Models\Kelas;
use App\Models\Presensi;
use App\Models\RegistrasiKelas;
use App\Models\User;
use Illuminate\Http\Request;
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
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'. route('data-kelas.presensi.show', [$row->kelas_id, $row->id]) .'" class="btn btn-sm btn-info" title="Lihat"><i class="far fa-eye"></i></a>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPresensi'.$row->id.'" title="Edit">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" id="konfirmasiHapus'.$row->id.'" onclick="confirmDelete(this)" data-id="'.$row->id.'" title="Hapus"><i class="far fa-trash-alt"></i></button>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'nama'])
                    ->make(true);
        }
        $kelas = Kelas::findOrfail($kelas_id);
        return view('admin_dashboard.admin.data-kelas.presensi.index', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'presensi' => $presensi]);
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
        $this->validate($request, [
            'tanggal' => 'required',
        ]);

        $data = $request->all();
        $data['kelas_id'] = $kelas_id;
        $dates = explode('to', $request->tanggal);
        $startDate = trim($dates[0]);
        $endDate = trim($dates[1]);
        $data['tanggal_mulai'] = $startDate;
        $data['tanggal_berakhir'] = $endDate;
        Presensi::create($data);

        return redirect()->route('data-kelas.presensi.index', [$kelas_id])->with('status', 'Presensi Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kelas_id, $id)
    {
        $kelas = Kelas::findOrfail($kelas_id);
        $presensi = Presensi::where('kelas_id', $kelas_id)->findOrFail($id);
        $dataPresensi = DataPresensi::with('user')->where('presensi_id', '=', $id)->whereRelation('presensi', 'kelas_id', '=', $kelas_id)->whereRelation('user', 'level', '=', 'peserta')->get();
        $tutor = User::leftJoin('kelas', 'users.id', '=', 'kelas.tutor_id')
            ->leftJoin('data_presensi', 'users.id', '=', 'data_presensi.user_id')
            ->select('users.*', 'data_presensi.status')
            ->where('kelas.id', '=', $kelas_id)
            ->where('users.level', '=', 'tutor')
            ->first();
        
        return view('admin_dashboard.admin.data-kelas.presensi.show', ['kelas' => $kelas, 'presensi' => $presensi, 'dataPresensi' => $dataPresensi, 'tutor' => $tutor]);
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
            'tanggal' => 'required',
        ]);
        
        $data = $request->all();

        $dates = explode('to', $request->tanggal);
        $startDate = trim($dates[0]);
        $endDate = trim($dates[1]);
        $data['tanggal_mulai'] = $startDate;
        $data['tanggal_berakhir'] = $endDate;

        $presensi = Presensi::findOrFail($id);
        
        $presensi->update($data);

        return redirect()->route('data-kelas.presensi.index', [$kelas_id])->with('status', 'Kelas berhasil di Perbarui');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelas_id, $id)
    {
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();

        $dataPresensi = DataPresensi::where('presensi_id', '=', $id);
        $dataPresensi->delete();

        return response()->json(array('success' => true));
    }
}
