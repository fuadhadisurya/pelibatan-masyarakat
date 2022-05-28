<?php

namespace App\Http\Controllers\admin_dashboard\tutor\kelasku;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\SilabusBab;
use App\Models\SilabusSubbab;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class SilabusDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $kelas_id, $silabus_id)
    {
        $silabusSubbab = SilabusSubbab::with('bab')->where('silabus_bab_id', '=', $silabus_id)->get();
        if ($request->ajax()) {
            return DataTables::of($silabusSubbab)
                    ->addIndexColumn()
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'.route('tutor.kelasku.silabus.detail.edit', [$row->bab->kelas_id, $row->silabus_bab_id, $row->id]).'" class="btn btn-sm btn-warning" title="edit"><i class="far fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger" id="konfirmasiHapus'.$row->id.'" onclick="confirmDelete(this)" data-id="'.$row->id.'" title="Hapus"><i class="far fa-trash-alt"></i></button>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);
        }

        $kelas = Kelas::where('tutor_id', Auth::user()->id)->findOrFail($kelas_id);
        $silabus = SilabusBab::where('kelas_id', $kelas_id)->findOrFail($silabus_id);

        return view('admin_dashboard.tutor.kelasku.silabus.subbab.index', ['kelas' => $kelas, 'silabus' => $silabus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kelas_id, $silabus_id)
    {
        $kelas = Kelas::where('tutor_id', Auth::user()->id)->findOrFail($kelas_id);
        $silabus = SilabusBab::where('kelas_id', $kelas_id)->findOrFail($silabus_id);

        return view('admin_dashboard.tutor.kelasku.silabus.subbab.create', ['kelas' => $kelas, 'silabus' => $silabus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $kelas_id, $silabus_id)
    {
        $this->validate($request, [
            "nama_subbab"   => "required|array",
            "nama_subbab.*" => "required|string",
        ]);

        $nama_subbab = $request->nama_subbab;
        $total = count($nama_subbab);

        for($i=0;$i<$total;$i++){
            SilabusSubbab::create([
                'silabus_bab_id' => $silabus_id,
                'nama_subbab' => $nama_subbab[$i],
            ]);
        }
        
        return redirect()->route('tutor.kelasku.silabus.detail.index',[$kelas_id, $silabus_id])->with('status', 'Silabus Subbab berhasil dibuat');
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
    public function edit($kelas_id, $silabus_id, $id)
    {
        $kelas = Kelas::where('tutor_id', Auth::user()->id)->findOrFail($kelas_id);
        $silabus = SilabusBab::where('kelas_id', $kelas_id)->findOrFail($silabus_id);
        $silabusSubbab = SilabusSubbab::where('silabus_bab_id', $silabus_id)->findOrFail($id);
        return view('admin_dashboard.tutor.kelasku.silabus.subbab.edit', ['kelas' => $kelas, 'silabus' => $silabus, 'silabusSubbab' => $silabusSubbab]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kelas_id, $silabus_id, $id)
    {
        $this->validate($request, [
            'nama_subbab' => 'required',
        ]);
        
        $silabusSubbab = SilabusSubbab::findOrFail($id);
        $silabusSubbab->update([
            'nama_subbab' => $request->nama_subbab,
        ]);

        return redirect()->route('tutor.kelasku.silabus.detail.index', [$kelas_id, $silabus_id])->with('status', 'Silabus Subbab berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelas_id, $quiz_id, $id)
    {
        $data = SilabusSubbab::findOrFail($id);

        $data->delete();

        return response()->json(array('success' => true));
    }
}
