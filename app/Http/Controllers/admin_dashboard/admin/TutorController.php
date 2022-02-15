<?php

namespace App\Http\Controllers\admin_dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('level', '=', 'tutor');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('gambar', function($row){
                        $gambar = ($row->gambar != null ) ? "Avatar Tutor (On Progress)" : asset('admin_dashboard/assets/img/90x90.jpg');
                        return '
                            <td class="text-center">
                                <div class="avatar avatar-sm">
                                    <img alt="avatar" src="'. $gambar .'" class="rounded-circle" width="50px" />
                                </div>
                            </td>
                        ';
                    })
                    ->addColumn('aksi', function($row){
                        return '
                            <td class="text-center">
                                <a href="'. route('tutor.edit', $row->id) .'" class="btn btn-sm btn-warning" title="Edit"><i class="far fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger" id="konfirmasiHapus'.$row->id.'" onclick="confirmDelete(this)" data-id="'.$row->id.'" title="Hapus"><i class="far fa-trash-alt"></i></button>
                            </td>
                        ';
                    })
                    ->rawColumns(['aksi', 'gambar'])
                    ->make(true);
        }
        return view('admin_dashboard.admin.tutor.index');
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
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'kontak' => 'required|numeric|unique:users,kontak',
            'username' => 'required|alpha_dash|unique:users,username',
            'password' => 'required|min:5',
            'konfirmasi_password' => 'required|same:password',
        ]);
        
        $data = $request->all();
        $data['level'] = 'tutor';
        $data['password'] = bcrypt($request->password);
        
        User::create($data);
        
        return redirect()->route('tutor.index')->with('status', 'Akun tutor berhasil dibuat');
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
        $tutor = User::findOrFail($id);
        return view('admin_dashboard.admin.tutor.edit', ['tutor' => $tutor]);
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
        if ($request->password) {
            $this->validate($request, [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'kontak' => 'required|numeric|unique:users,kontak,' . $id,
                'username' => 'required|alpha_dash|unique:users,username,' . $id,
                'password' => 'required|min:5',
                'konfirmasi_password' => 'required|same:password',
            ]);
        } else {
            $this->validate($request, [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'kontak' => 'required|numeric|unique:users,kontak,' . $id,
                'username' => 'required|alpha_dash|unique:users,username,' . $id,
            ]);
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $tutor = User::findOrFail($id);

        $tutor->update($data);

        return redirect()->route('tutor.index')->with('status', 'Tutor berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutor = User::findOrFail($id);

        Storage::disk('public')->delete($tutor['gambar']);
        
        $tutor->delete();

        return response()->json(array('success' => true));
    }
}
