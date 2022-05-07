<?php

namespace App\Http\Controllers\admin_dashboard\tutor\kelasku;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
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
        $quiz = Quiz::findOrFail($quiz_id);
        $nilai = QuizJawaban::with('user')
            ->leftJoin('quiz_soal', 'quiz_soal.id', '=', 'quiz_jawaban.quiz_soal_id')
            ->where('quiz_soal.quiz_id', $quiz_id)
            ->get();

        $no = 0;
        $jawabanBenar = 0;
        $jawabanSalah = 0;
        $jawabanKosong = 0;
        $data = array();
        foreach ($quiz as $n) {
            if($n->jawaban == $n->kunci_jawaban){
                $jawabanBenar+=1;
            }
            if($n->jawaban == $n->kunci_jawaban){
                $jawabanSalah+=1;
            }
            if($n->jawaban == null){
                $jawabanKosong=1;
            }
            // $jumlahSoal = count($quiz);
            // $skorTotal = round($jawabanBenar/$jumlahSoal * 100, 0);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $n->user->nama;
            $row[] = $jawabanBenar;
            $row[] = $jawabanKosong;
            $row[] = $jawabanKosong;
            $row[] = 1;
            $row[] = '<a href="/trixmath/nilai/' . $n->id_kuis . '/siswa/' . $n->id_user . '/jawaban" class="btn btn-sm btn-primary">Jawaban Siswa</a>';
            $data[] = $row;
        }
        // dd($data);
        if ($request->ajax()) {
            return DataTables::of($data)->escapeColumns([])->make(true);
        }


        // $jawaban = Quiz::where('kelas_id', $kelas_id)->where('id', $quiz_id)->with('quizSoal.quizJawaban')->get();
        // if ($request->ajax()) {
        //     return DataTables::of(['nama' =>'1'])
        //             ->addIndexColumn()
        //             ->addColumn('jawaban_benar', function($row){
        //                 $jawabanBenar = 0;
        //                 // if($row->kelas->quiz == $row->user->quizJawaban->jawaban){
        //                 //     $jawabanBenar+=1;
        //                 // }
        //                 return $row;
        //             })
        //             ->addColumn('jawaban_salah', function($row){
        //                 $jawabanSalah = 0;
        //                 // if($row->user->quizJawaban != $row->user->quizJawaban->jawaban){
        //                 //     $jawabanSalah+=1;
        //                 // }
        //             })
        //             ->addColumn('jawaban_kosong', function($row){
        //                 $jawabanKosong = 0;
        //                 // if($row->user->quizJawaban == null){
        //                 //     $jawabanKosong+=1;
        //                 // }
        //             })
        //             ->addColumn('skor', function($row){
        //                 // $jumlahSoal = count($quiz);

        //                 // $skorTotal = round($jawabanBenar/$jumlahSoal * 100, 0);
        //             })
        //             ->addColumn('aksi', function($row){

        //             })
        //             ->rawColumns(['jawaban_benar', 'jawaban_salah', 'jawaban_kosong', 'skor', 'aksi'])
        //             ->make(true);
        // }

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
