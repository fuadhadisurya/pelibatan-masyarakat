<?php

namespace App\Http\Controllers\admin_dashboard\peserta\eventku;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Event;
use App\Models\RegistrasiEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        $dokumentasi = Dokumentasi::where('event_id', '=', $event_id)->get();
        if ($request->ajax()) {
            return DataTables::of($dokumentasi)
                    ->addIndexColumn()
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'.route('dokumentasi.download', [$row->event_id, $row->id]).'" class="btn btn-sm btn-primary" title="Download File">
                                    <i class="far fa-save"></i>
                                </a>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);
        }

        $event = Event::findOrfail($event_id);
        $registrasi = RegistrasiEvent::where('event_id', '=', $event_id)->where('user_id', Auth::user()->id)->first();

        return view('admin_dashboard.peserta.eventku.dokumentasi.index', ['event' => $event, 'dokumentasi' => $dokumentasi, 'registrasi' => $registrasi]);
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
