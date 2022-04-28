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
                                <a href="'.route('tutor.kelasku.quiz.show', [$row->kelas_id, $row->id]).'" class="btn btn-sm btn-info" title="show"><i class="far fa-eye"></i></a>
                                <a href="'.route('tutor.kelasku.quiz.edit', [$row->kelas_id, $row->id]).'" class="btn btn-sm btn-warning" title="edit"><i class="far fa-edit"></i></a>
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
            "file"   => "array",
            "file.*" => "mimetypes:video/*,audio/*,image/*",
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

        if ($request->file('file')){
            foreach($request->file('file') as $key=>$data){
                $file[$key] = $data->store('soal_quiz', 'public');
            }
        }

        for($i=0;$i<$total;$i++){
            if ($request->file('file')){
                if(!empty($file[$i])) { 
                    QuizSoal::create([
                        'quiz_id' => $quiz->id,
                        'soal' => $soal[$i],
                        'a' => $a[$i],
                        'b' => $b[$i],
                        'c' => $c[$i],
                        'd' => $d[$i],
                        'kunci_jawaban' => $kunci_jawaban[$i],
                        'file' => $file[$i],
                    ]);
                } else {
                    QuizSoal::create([
                        'quiz_id' => $quiz->id,
                        'soal' => $soal[$i],
                        'a' => $a[$i],
                        'b' => $b[$i],
                        'c' => $c[$i],
                        'd' => $d[$i],
                        'kunci_jawaban' => $kunci_jawaban[$i],
                        'file' => null,
                    ]);
                }
            } else {
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
        }
        
        return redirect()->route('tutor.kelasku.quiz.index',[$kelas_id])->with('status', 'Quiz berhasil dibuat');
        
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
    public function edit($kelas_id, $id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $quiz = Quiz::with('quizSoal')->findOrFail($id);

        return view('admin_dashboard.tutor.kelasku.quiz.edit', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'quiz' => $quiz]);
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
        $data = Quiz::with('quizSoal')->findOrFail($id);
        
        foreach ($data->quizSoal as $item) {
            $item->delete();
        }

        $data->delete();

        return response()->json(array('success' => true));
    }
}
