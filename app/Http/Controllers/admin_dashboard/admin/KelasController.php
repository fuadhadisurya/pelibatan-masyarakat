<?php

namespace App\Http\Controllers\admin_dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\KelasKategori;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kelas::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('periode_kelas', function($row){
                        return $row->tanggal_berakhir . ' s.d. ' . $row->tanggal_berakhir;
                    })
                    ->editColumn('tutor_id', function($row){
                        return $row->tutor->nama;
                    })
                    ->editColumn('status', function($row){
                        $status = ($row->status == 'Aktif') ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' ;
                        return '
                        <td class="text-center">
                            <a href="'. route("kelas.status", $row) .'" class="d-flex justify-content-center">
                                '. $status .'
                            </a>
                        </td>
                        ';
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'. route('kelas.edit', $row->id) .'" class="btn btn-sm btn-warning" title="Edit"><i class="far fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger" id="konfirmasiHapus'.$row->id.'" onclick="confirmDelete(this)" data-id="'.$row->id.'" title="Hapus"><i class="far fa-trash-alt"></i></button>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'status'])
                    ->make(true);
        }
        $tutor = User::all()->where('level', '=', 'tutor');
        return view('admin_dashboard.admin.kelas.index', ['tutor' => $tutor]);
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
        $this->validate($request, [
            'nama_kelas' => 'required',
            'periode_kelas' => 'required',
            'deskripsi' => 'required',
            'tutor_id' => 'required',
            'status' => 'required',
        ]);
        
        $data = $request->all();
        $dates = explode('to', $request->periode_kelas);
        $startDate = trim($dates[0]);
        $endDate = trim($dates[1]);
        $data['tanggal_mulai'] = $startDate;
        $data['tanggal_berakhir'] = $endDate;
        
        Kelas::create($data);
        $kelas = Kelas::latest()->first();

        return redirect()->route('kelas.index')->with('status', 'Kelas Berhasil Dibuat');
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
        $tutor = User::all()->where('level', '=', 'tutor');
        $kelas = Kelas::findOrFail($id);
        return view('admin_dashboard.admin.kelas.edit', ['kelas' => $kelas, 'tutor' => $tutor]);
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
        $this->validate($request, [
            'nama_kelas' => 'required',
            'periode_kelas' => 'required',
            'tutor_id' => 'required',
            'status' => 'required',
        ]);
        
        $data = $request->all();

        $dates = explode('to', $request->periode_kelas);
        $startDate = trim($dates[0]);
        $endDate = trim($dates[1]);
        $data['tanggal_mulai'] = $startDate;
        $data['tanggal_berakhir'] = $endDate;

        $kelas = Kelas::findOrFail($id);

        $kelas->update($data);

        return redirect()->route('kelas.index')->with('status', 'Kelas berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutor = Kelas::findOrFail($id);

        $tutor->delete();

        return response()->json(array('success' => true));
    }

    public function status($id){
        $data = Kelas::findOrFail($id);
        
        ($data->status == 'Aktif') ? $status = "Tidak Aktif" : $status = "Aktif" ;
        
        $data->update([
            'status' => $status
        ]);

        return back()->with('status','Status berhasil diganti');
    }
}
