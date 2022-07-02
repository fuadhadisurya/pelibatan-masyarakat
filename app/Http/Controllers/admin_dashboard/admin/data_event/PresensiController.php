<?php

namespace App\Http\Controllers\admin_dashboard\admin\data_event;

use App\Http\Controllers\Controller;
use App\Models\DataPresensiEvent;
use App\Models\Event;
use App\Models\PresensiEvent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
                    ->addColumn('nama', function ($row) {
                        $angka = 0;
                        $angka++;
                        return 'Kehadiran ' . $angka;
                    })
                    ->editColumn('tanggal_mulai', function($row){
                        return Carbon::parse($row->tanggal_mulai)->format('j F Y H:i');
                    })
                    ->editColumn('tanggal_berakhir', function($row){
                        return Carbon::parse($row->tanggal_berakhir)->format('j F Y H:i');
                    })
                    ->addColumn('aksi', function ($row) {
                        return '
                                <td class="text-center">
                                    <a href="' . route('data-event.presensi.show', [$row->event_id, $row->id]) . '" class="btn btn-sm btn-info" title="Lihat"><i class="far fa-eye"></i></a>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPresensi' . $row->id . '" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" id="konfirmasiHapus' . $row->id . '" onclick="confirmDelete(this)" data-id="' . $row->id . '" title="Hapus"><i class="far fa-trash-alt"></i></button>
                                </td>
                            ';
                    })
                    ->rawColumns(['aksi', 'nama'])
                    ->make(true);
        }
        $event = Event::findOrfail($event_id);
        
        return view('admin_dashboard.admin.data-event.presensi.index', ['event' => $event, 'event_id' => $event_id, 'presensi' => $presensi]);
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
        $this->validate($request, [
            'tanggal' => 'required',
        ]);

        $data = $request->all();
        $data['event_id'] = $event_id;
        $dates = explode('to', $request->tanggal);
        if (count($dates) < 2) {
            return redirect()->back()->withErrors(['error' => 'Mohon isi presensi tutup juga']);
        }
        $startDate = trim($dates[0]);
        $endDate = trim($dates[1]);
        $data['tanggal_mulai'] = $startDate;
        $data['tanggal_berakhir'] = $endDate;
        PresensiEvent::create($data);

        return redirect()->route('data-event.presensi.index', [$event_id])->with('status', 'Presensi Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event_id, $id)
    {
        $event = Event::findOrfail($event_id);
        $presensi = PresensiEvent::where('event_id', $event_id)->findOrFail($id);
        $dataPresensi = DataPresensiEvent::with('user')->where('presensi_event_id', '=', $id)->whereRelation('presensi', 'event_id', '=', $event_id)->whereRelation('user', 'level', '=', 'peserta')->get();
        $tutor = User::leftJoin('kelas', 'users.id', '=', 'kelas.tutor_id')
            ->leftJoin('data_presensi', 'users.id', '=', 'data_presensi.user_id')
            ->select('users.*', 'data_presensi.status', 'data_presensi.created_at as waktu_mengisi')
            ->where('kelas.id', '=', $event_id)
            ->where('users.level', '=', 'tutor')
            ->first();

        return view('admin_dashboard.admin.data-event.presensi.show', ['event' => $event, 'presensi' => $presensi, 'dataPresensi' => $dataPresensi, 'tutor' => $tutor]);
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
    public function update(Request $request, $event_id, $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
        ]);

        $data = $request->all();

        $dates = explode('to', $request->tanggal);
        if (count($dates) < 2) {
            return redirect()->back()->withErrors(['error' => 'Mohon isi presensi tutup juga']);
        }
        $startDate = trim($dates[0]);
        $endDate = trim($dates[1]);
        $data['tanggal_mulai'] = $startDate;
        $data['tanggal_berakhir'] = $endDate;

        $presensi = PresensiEvent::findOrFail($id);
        $presensi->update($data);

        return redirect()->route('data-event.presensi.index', [$event_id])->with('status', 'Presensi berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event_id, $id)
    {
        $presensi = PresensiEvent::findOrFail($id);
        $presensi->delete();

        $dataPresensi = DataPresensiEvent::where('presensi_event_id', '=', $id);
        $dataPresensi->delete();

        return response()->json(array('success' => true));
    }
}