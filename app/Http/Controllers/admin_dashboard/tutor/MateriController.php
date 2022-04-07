<?php

namespace App\Http\Controllers\admin_dashboard\tutor;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\UploadMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kelas_id, Request $request)
    {
        if ($request->ajax()) {
            $data = Materi::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihat'.$row->id.'" title="Lihat">
                                    <i class="far fa-eye"></i>
                                </button>
                                <a href="'.route('tutor.kelasku.materi.edit', [$row->kelas_id, $row->id]).'" class="btn btn-sm btn-warning" title="edit"><i class="far fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger" id="konfirmasiHapus'.$row->id.'" onclick="confirmDelete(this)" data-id="'.$row->id.'" title="Hapus"><i class="far fa-trash-alt"></i></button>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'status'])
                    ->make(true);
        }
        $kelas = Kelas::where('status', '=', 'Pendaftaran')->findOrfail($kelas_id);
        $materi = Materi::where('kelas_id', $kelas_id)->get();
        
        return view('admin_dashboard.tutor.kelasku.materi.index', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'materi' => $materi]);
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
    public function store($kelas_id, Request $request)
    {
        
        $data = $request->all();
        $data['kelas_id'] = $kelas_id;
        $materi = Materi::create($data);

        if ($request->file('materi')){
            foreach ($request->file('materi') as $file) {
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
            
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $file->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;

                $data['materi'] = $file->storeAs('materi', $filenametostore, 'public');
                
                $data['materi_id'] = $materi->id;
                UploadMateri::create($data);
            }
        }

        return redirect('/tutor/kelasku/'.$kelas_id.'/materi')->with('status', 'Materi Berhasil diupload');
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
    public function edit($kelas_id, $id)
    {
        $materi = Materi::findOrFail($id);
        return view('admin_dashboard.tutor.kelasku.materi.edit', ['materi' => $materi]);
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
    public function destroy($kelas_id, $id)
    {
        $data = Materi::with('uploadMateri')->findOrFail($id);
        
        foreach ($data->uploadMateri as $item) {
            Storage::disk('public')->delete($item->materi);
            $item->delete();
        }

        $data->delete();

        return response()->json(array('success' => true));
    }

    public function download($kelas_id, $id){
        $uploadMateri = UploadMateri::findOrFail($id);
        return Storage::disk('public')->download($uploadMateri['materi']);
    }
}
