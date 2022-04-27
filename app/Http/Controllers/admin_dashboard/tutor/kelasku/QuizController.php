<?php

namespace App\Http\Controllers\admin_dashboard\tutor\kelasku;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Quiz;
use App\Models\QuizSoal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $kelas_id)
    {
        $tugas = Quiz::where('kelas_id', '=', $kelas_id)->get();
        if ($request->ajax()) {
            return DataTables::of($tugas)
                    ->addIndexColumn()
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'.route('tutor.kelasku.tugas.show', [$row->kelas_id, $row->id]).'" class="btn btn-sm btn-info" title="edit"><i class="far fa-eye"></i></a>
                                <a href="'.route('tutor.kelasku.tugas.edit', [$row->kelas_id, $row->id]).'" class="btn btn-sm btn-warning" title="edit"><i class="far fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger" id="konfirmasiHapus'.$row->id.'" onclick="confirmDelete(this)" data-id="'.$row->id.'" title="Hapus"><i class="far fa-trash-alt"></i></button>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'status'])
                    ->make(true);
        }

        $kelas = Kelas::findOrFail($kelas_id);
        return view('admin_dashboard.tutor.kelasku.quiz.index', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'tugas' => $tugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kelas_id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        return view('admin_dashboard.tutor.kelasku.quiz.create', ['kelas' => $kelas, 'kelas_id' => $kelas_id]);
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
            'nama_quiz' => 'required',
            'batas_waktu' => 'required',
            'aktif' => 'required',
            'status' => 'required',
            "soal"   => "required|array",
            "soal.*" => "required|string",
            "a"   => "required|array",
            "a.*" => "required|string",
            "b"   => "required|array",
            "b.*" => "required|string",
            "c"   => "required|array",
            "c.*" => "required|string",
            "d"   => "required|array",
            "d.*" => "required|string",
            "kunci_jawaban"   => "required|array",
            "kunci_jawaban.*" => "required|string",
            // "file"   => "required|array",
            // "file.*" => "required|string",
        ]);

        $data = $request->all();
        $data['kelas_id'] = $kelas_id;
        $quiz = Quiz::create($data);
        
        $soal = $request->soal;
        $a = $request->a;
        $b = $request->b;
        $c = $request->c;
        $d = $request->d;
        $kunci_jawaban = $request->kunci_jawaban;
        $total = count($soal);
        
        for($i=0;$i<$total;$i++){
            QuizSoal::create([
                'quiz_id' => $quiz->id,
                'soal' => $soal[$i],
                'a' => $a[$i],
                'b' => $b[$i],
                'c' => $c[$i],
                'd' => $d[$i],
                'kunci_jawaban' => $kunci_jawaban[$i],
            ]); 
        }
        return 'sukses';
            
        // if ($request->file('file')){
        //     foreach ($request->file('file') as $file) {
        //         //get filename with extension
        //         $filenamewithextension = $file->getClientOriginalName();
            
        //         //get filename without extension
        //         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
        //         //get file extension
        //         $extension = $file->getClientOriginalExtension();
        
        //         //filename to store
        //         $filenametostore = $filename.'_'.time().'.'.$extension;

        //         $data['tugas'] = $file->storeAs('tugas', $filenametostore, 'public');
                
        //         // $data['tugas_id'] = $tugas->id;
        //         UploadTugas::create($data);
        //     }
        // }
        
        // echo $request->file->getClientMimeType();
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
