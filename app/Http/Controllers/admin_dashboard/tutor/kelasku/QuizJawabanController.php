<?php

namespace App\Http\Controllers\admin_dashboard\tutor\kelasku;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\NilaiQuiz;
use App\Models\Quiz;
use App\Models\QuizJawaban;
use App\Models\QuizSoal;
use App\Models\RegistrasiKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QuizJawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $kelas_id, $quiz_id)
    {
        $jawaban = NilaiQuiz::with('users')->with('quiz')->where('quiz_id', $quiz_id)->get();
        if ($request->ajax()) {
            return DataTables::of($jawaban)
                    ->addIndexColumn()
                    ->addColumn('nama', function($row){
                        return $row->users->nama;
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="' . route('tutor.kelasku.quiz.jawaban.show', [$row->quiz->kelas_id, $row->quiz->id, $row->id]) . '" class="btn btn-sm btn-info" title="lihat hasil jawaban"><i class="far fa-eye"></i></a>
                            </td>
                        ';
                    })
                    ->rawColumns(['nama', 'aksi'])
                    ->make(true);
        }

        $kelas = Kelas::findOrFail($kelas_id);
        return view('admin_dashboard.tutor.kelasku.quiz.jawaban.index', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'quiz_id' => $quiz_id]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kelas_id, $quiz_id, $id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $informasiQuiz = Quiz::with('quizSoal')->findOrFail($id);
        $quiz = QuizJawaban::with('quizSoal')->where('quiz_id', $id)->where('user_id', Auth::user()->id)->get();
        $hasil = NilaiQuiz::where('quiz_id', $id)->where('user_id', Auth::user()->id)->first();

        foreach ($quiz as $jawaban){
            $soal = $jawaban->quizSoal;
            
            if ($soal->file != null) {
                $file = explode('.', $soal->file);
                $path = trim($file[0]);
                $extension = trim($file[1]);
                $soal['file_extension'] = $extension;
            }
        }

        return view('admin_dashboard.tutor.kelasku.quiz.show', ['kelas' => $kelas, 'quiz' => $quiz, 'informasiQuiz' =>  $informasiQuiz, 'hasil' => $hasil]);
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
