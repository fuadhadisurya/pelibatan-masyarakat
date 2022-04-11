<?php

namespace App\Http\Controllers\admin_dashboard\admin\data_kelas;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Presensi;
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
                        return 'Data Kehadiran '.$row->id;
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'. route('kelas.edit', $row->id) .'" class="btn btn-sm btn-info" title="Lihat"><i class="far fa-eye"></i></a>
                                <a href="'. route('kelas.edit', $row->id) .'" class="btn btn-sm btn-warning" title="Edit"><i class="far fa-edit"></i></a>
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
