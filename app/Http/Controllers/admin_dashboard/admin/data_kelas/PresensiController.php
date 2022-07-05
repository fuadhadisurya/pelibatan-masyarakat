<?php

namespace App\Http\Controllers\admin_dashboard\admin\data_kelas;

use App\Http\Controllers\Controller;
use App\Models\DataPresensi;
use App\Models\Kelas;
use App\Models\Presensi;
use App\Models\RegistrasiKelas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                ->addColumn('nama', function ($row) {
                    $angka = 1;
                    for ($i=1; $i < $row->id; $i++) { 
                        $angka++;
                    }
                    return 'Kehadiran '.$angka;
                })
                ->editColumn('tanggal_mulai', function($row){
                    return Carbon::parse($row->tanggal_mulai)->format('j F Y H:i');
                })
                ->editColumn('tanggal_berakhir', function($row){
                    return Carbon::parse($row->tanggal_berakhir)->format('j F Y H:i');
                })
                ->addColumn('aksi', function ($row) {
                    return '
                            <td class="text-center">
                                <a href="' . route('data-kelas.presensi.show', [$row->kelas_id, $row->id]) . '" class="btn btn-sm btn-info" title="Lihat"><i class="far fa-eye"></i></a>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPresensi' . $row->id . '" title="Edit">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" id="konfirmasiHapus' . $row->id . '" onclick="confirmDelete(this)" data-id="' . $row->id . '" title="Hapus"><i class="far fa-trash-alt"></i></button>
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
        if (count($dates) < 2) {
            return redirect()->back()->withErrors(['error' => 'Mohon isi presensi tutup juga']);
        }
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
        // $dataPresensi = DataPresensi::with('user')->where('presensi_id', '=', $id)->whereRelation('presensi', 'kelas_id', '=', $kelas_id)->whereRelation('user', 'level', '=', 'peserta')->get();
        $dataPresensi = User::select('users.*', 'data_presensi.id AS presensi_id', 'data_presensi.created_at AS waktu_mengisi', 'data_presensi.status AS presensi_status')
            ->leftJoin('registrasi_kelas', 'users.id', '=', 'registrasi_kelas.user_id')
            ->leftJoin('data_presensi', 'data_presensi.user_id', '=', DB::raw('users.id AND data_presensi.presensi_id = ' . $id))
            ->where('users.level', 'peserta')->get();
        // dd($dataPresensi);
        $tutor = User::leftJoin('kelas', 'users.id', '=', 'kelas.tutor_id')
            ->leftJoin('data_presensi', 'users.id', '=', 'data_presensi.user_id')
            ->select('users.*', 'data_presensi.status', 'data_presensi.created_at as waktu_mengisi')
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
        if (count($dates) < 2) {
            return redirect()->back()->withErrors(['error' => 'Mohon isi presensi tutup juga']);
        }
        $startDate = trim($dates[0]);
        $endDate = trim($dates[1]);
        $data['tanggal_mulai'] = $startDate;
        $data['tanggal_berakhir'] = $endDate;

        $presensi = Presensi::findOrFail($id);

        $presensi->update($data);

        return redirect()->route('data-kelas.presensi.index', [$kelas_id])->with('status', 'Presensi berhasil di Perbarui');
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
