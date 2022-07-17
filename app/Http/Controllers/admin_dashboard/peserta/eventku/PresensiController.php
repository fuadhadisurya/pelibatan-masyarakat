<?php

namespace App\Http\Controllers\admin_dashboard\peserta\eventku;

use App\Http\Controllers\Controller;
use App\Models\DataPresensiEvent;
use App\Models\Event;
use App\Models\PresensiEvent;
use App\Models\RegistrasiEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        $presensi = PresensiEvent::where('event_id', '=', $event_id)->get();
        if ($request->ajax()) {
            return DataTables::of($presensi)
                    ->addIndexColumn()
                    ->addColumn('tanggal', function($row){
                        // $angka = 1;
                        // for ($i=1; $i < $row->id; $i++) { 
                        //     $angka++;
                        // }
                        // return 'Kehadiran '.$angka;
                        return Carbon::parse($row->tanggal_mulai)->format('j F Y');
                    })
                    ->editColumn('tanggal_mulai', function($row){
                        return Carbon::parse($row->tanggal_mulai)->format('j F Y H:i');
                    })
                    ->editColumn('tanggal_berakhir', function($row){
                        return Carbon::parse($row->tanggal_berakhir)->format('j F Y H:i');
                    })
                    ->addColumn('status', function($row){
                        $dataPresensi = DataPresensiEvent::where('presensi_event_id', '=', $row->id)->where('user_id', '=', Auth::user()->id)->first();
                        if ($dataPresensi != null) {
                            return '<span class="badge badge-info">'.$dataPresensi->status.'</span>';
                        } elseif (Carbon::now() > $row->tanggal_berakhir && $dataPresensi == null){
                            return '<span class="badge badge-danger">Tidak Hadir</span>';
                        } elseif (Carbon::now() < $row->tanggal_berakhir && $dataPresensi == null){
                            return '<span class="badge badge-info">Presensi Belum Dibuka</span>';
                        } else {
                            return '<span class="badge badge-warning">Belum Mengisi</span>';
                        }
                    })
                    ->addColumn('aksi', function($row){
                        $dataPresensi = DataPresensiEvent::where('presensi_event_id', '=', $row->id)->where('user_id', '=', Auth::user()->id)->first();
                        if(Carbon::now() < $row->tanggal_mulai){
                            $aksi = '
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#isiPresensi'.$row->id.'" disabled>
                                    <i class="far fa-file-alt"></i>
                                </button>
                            </td>';
                        } else {
                            if ($dataPresensi != null) {
                                $aksi = '
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#isiPresensi'.$row->id.'" disabled>
                                        <i class="far fa-file-alt"></i>
                                    </button>
                                </td>';
                            } elseif(Carbon::now() > $row->tanggal_berakhir) {
                                $aksi = '
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#isiPresensi'.$row->id.'" disabled>
                                        <i class="far fa-file-alt"></i>
                                    </button>
                                </td>';
                            } else {
                                $aksi = '
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#isiPresensi'.$row->id.'">
                                        <i class="far fa-file-alt"></i>
                                    </button>
                                </td>';
                            }
                        }
                        return $aksi;
                    })
                    ->rawColumns(['aksi', 'nama', 'status'])
                    ->make(true);
        }
        $event = Event::findOrfail($event_id);
        $registrasi = RegistrasiEvent::where('event_id', '=', $event_id)->where('user_id', Auth::user()->id)->first();

        return view('admin_dashboard.peserta.eventku.presensi.index', ['event' => $event, 'event_id' => $event_id, 'presensi' => $presensi, 'registrasi' => $registrasi]);
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
    public function store(Request $request, $event_id)
    {
        if($request->gambar){
            $this->validate($request, [
                'status' => 'required',
                'gambar' => 'required|image',
            ]);
        } else {
            $this->validate($request, [
                'status' => 'required',
            ]);
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if($request->gambar){
            //get filename with extension
            $filenamewithextension = $request->file('gambar')->getClientOriginalName();
        
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('gambar')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            $data['gambar'] = $request->file('gambar')->storeAs('presensi_event', $filenametostore, 'public');
        }
        
        DataPresensiEvent::create($data);

        return redirect()->route('peserta.eventku.presensi.index', [$event_id])->with('status', 'Berhasil mengisi presensi');
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
