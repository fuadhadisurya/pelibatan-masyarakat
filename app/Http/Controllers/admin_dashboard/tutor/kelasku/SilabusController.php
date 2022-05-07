<?php

namespace App\Http\Controllers\admin_dashboard\tutor\kelasku;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\SilabusBab;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SilabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $kelas_id)
    {
        $silabusBab = SilabusBab::where('kelas_id', '=', $kelas_id)->get();
        if ($request->ajax()) {
            return DataTables::of($silabusBab)
                    ->addIndexColumn()
                    ->addColumn('subbab', function($row){
                        return '
                            <a href="'.route('tutor.kelasku.quiz.soal.index', [$row->kelas_id, $row->id]).'" class="btn btn-sm btn-primary" title="kelola soal"><i class="far fa-list-alt"></i></a>
                        ';
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'.route('tutor.kelasku.quiz.edit', [$row->kelas_id, $row->id]).'" class="btn btn-sm btn-warning" title="edit"><i class="far fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger" id="konfirmasiHapus'.$row->id.'" onclick="confirmDelete(this)" data-id="'.$row->id.'" title="Hapus"><i class="far fa-trash-alt"></i></button>
                            </td>
                        ';
                    })
                    ->rawColumns(['subbab', 'aksi'])
                    ->make(true);
        }

        $kelas = Kelas::findOrFail($kelas_id);

        return view('admin_dashboard.tutor.kelasku.silabus.index', ['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kelas_id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        return view('admin_dashboard.tutor.kelasku.silabus.create', ['kelas' => $kelas]);
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
            "nama_bab"   => "required|array",
            "nama_bab.*" => "required|string",
        ]);

        $nama_bab = $request->nama_bab;
        $total = count($nama_bab);

        for($i=0;$i<$total;$i++){
            SilabusBab::create([
                'kelas_id' => $kelas_id,
                'nama_bab' => $nama_bab[$i],
            ]);
        }
        
        return redirect()->route('tutor.kelasku.silabus.index',[$kelas_id])->with('status', 'Silabus Bab berhasil dibuat');
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
