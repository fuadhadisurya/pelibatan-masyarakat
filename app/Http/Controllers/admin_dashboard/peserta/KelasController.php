<?php

namespace App\Http\Controllers\admin_dashboard\peserta;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\RegistrasiKelas;
use App\Rules\wordCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::where('status', '=', 'Pendaftaran')->get();
        return view('admin_dashboard.peserta.kelas.index', ['kelas' => $kelas]);
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
        $kelas = Kelas::where('status', '=', 'Pendaftaran')->findOrfail($id);

        $registrasi_kelas = RegistrasiKelas::where('user_id', '=', Auth::user()->id)->where('kelas_id', '=', $kelas->id)->get();
        
        return view('admin_dashboard.peserta.kelas.show', ['kelas' => $kelas, 'registrasi_kelas' => $registrasi_kelas]);
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

    public function daftar(Request $request, $id){
        // dd($request);
        $this->validate($request, [
            'motivasi' => ['required', new wordCount(29)],
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['kelas_id'] = $id;
        RegistrasiKelas::create($data);
        
        return redirect()->route('peserta.kelas.show', $id)->with('success', 'Berhasil Mendaftar Kelas');
    }
}
