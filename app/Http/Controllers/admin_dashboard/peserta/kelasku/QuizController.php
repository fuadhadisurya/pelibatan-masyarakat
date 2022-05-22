<?php

namespace App\Http\Controllers\admin_dashboard\peserta\kelasku;

use App\Http\Controllers\Controller;
use App\Models\JawabanTugas;
use App\Models\Kelas;
use App\Models\Quiz;
use App\Models\QuizJawaban;
use App\Models\QuizSoal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $quiz = Quiz::where('kelas_id', '=', $kelas_id)->get();
        if ($request->ajax()) {
            return DataTables::of($quiz)
                ->addIndexColumn()
                ->addColumn('keterangan', function ($row) {
                    return '
                            Tanggal : ' . Carbon::parse($row->tanggal_quiz)->format('j F Y') . ',<br>
                            Waktu : ' . $row->waktu_pengerjaan . ' Menit
                        ';
                })
                ->addColumn('aktif', function ($row) {
                    if ($row->aktif == 'Y') {
                        $aktif = '<span class="badge badge-pill badge-success">Aktif</span>';
                    } else {
                        $aktif = '<span class="badge badge-pill badge-danger">Tidak Aktif</span>';
                    }
                    return $aktif;
                })
                ->addColumn('aksi', function ($row) {
                    // if(QuizJawaban::where('user_id', Auth::user()->id) != null && QuizJawaban::where('quiz_id', $row->id)){
                    //     $return = '
                    //         <td class="text-center">
                    //             <a href="' . route('peserta.quiz.jawaban.show', [$row->kelas_id, $row->id]) . '" class="btn btn-sm btn-info" title="lihat hasil jawaban"><i class="far fa-eye"></i></a>
                    //         </td>
                    //     ';
                    // } else {
                        $return = '
                            <td class="text-center">
                                <a href="' . route('peserta.kelasku.quiz.show', [$row->kelas_id, $row->id]) . '" class="btn btn-sm btn-primary" title="kerjakan soal"><i class="far fa-edit"></i></a>
                            </td>
                        ';
                    // }
                    return $return;
                })
                ->rawColumns(['keterangan', 'aktif', 'aksi'])
                ->make(true);
        }

        $kelas = Kelas::findOrFail($kelas_id);
        return view('admin_dashboard.peserta.kelasku.quiz.index', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'quiz' => $quiz]);
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
    public function show($kelas_id, $id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $quiz = Quiz::with('quizSoal')->findOrFail($id);

        foreach ($quiz->quizSoal as $soal) {
            if ($soal->file != null) {
                $file = explode('.', $soal->file);
                $path = trim($file[0]);
                $extension = trim($file[1]);
                $soal['file_extension'] = $extension;
            }
        }

        return view('admin_dashboard.peserta.kelasku.quiz.show', ['kelas' => $kelas, 'kelas_id' => $kelas_id, 'quiz' => $quiz]);
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

    public function jawaban(Request $request, $kelas_id, $quiz_id)
    {
        $jawaban = $request->jawaban;
        $quiz_soal_id = $request->quiz_soal_id;
        $total = count($quiz_soal_id);

        for ($i = 0; $i < $total; $i++) {
            if (!empty($jawaban[$i])) {
                QuizJawaban::create([
                    'user_id' => Auth::user()->id,
                    'quiz_id' => $quiz_id,
                    'quiz_soal_id' => $quiz_soal_id[$i],
                    'jawaban' => $jawaban[$i],
                ]);
            } else {
                QuizJawaban::create([
                    'user_id' => Auth::user()->id,
                    'quiz_id' => $quiz_id,
                    'quiz_soal_id' => $quiz_soal_id[$i],
                    'jawaban' => null,
                ]);
            }
        }

        return redirect()->route('peserta.kelasku.quiz.index', [$kelas_id])->with('status', 'Berhasil menyelesaikan quiz');
    }

    public function hasil($kelas_id, $id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $informasiQuiz = Quiz::with('quizSoal')->findOrFail($id);
        $quiz = QuizJawaban::with('quizSoal')->where('quiz_id', $id)->get();
        foreach ($quiz as $jawaban){
            $soal = $jawaban->quizSoal;
            
            if ($soal->file != null) {
                $file = explode('.', $soal->file);
                $path = trim($file[0]);
                $extension = trim($file[1]);
                $soal['file_extension'] = $extension;
            }
        } 

        return view('admin_dashboard.peserta.kelasku.quiz.hasil', ['kelas' => $kelas, 'quiz' => $quiz, 'informasiQuiz' =>  $informasiQuiz]);
    }
}
