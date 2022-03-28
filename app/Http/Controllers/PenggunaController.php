<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PenggunaController extends Controller
{
    public function profil(){
        // $response = Http::get('http://dev.farizdotid.com/api/daerahindonesia/provinsi');
        // $provinsi = $response->json();
        $peserta = User::where('id', Auth::user()->id)->first();
        return view('admin_dashboard.pengaturan.profil', ['peserta' => $peserta]);
    }

    public function update_profil(Request $request, $id){
        if ($request->password) {
            $this->validate($request, [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'nomor_telepon' => 'required|numeric|unique:users,nomor_telepon,' . $id,
                'username' => 'required|alpha_dash|unique:users,username,' . $id,
                'password' => 'required|min:6',
                'konfirmasi_password' => 'required|same:password',
            ]);
        } else {
            $this->validate($request, [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'nomor_telepon' => 'required|numeric|unique:users,nomor_telepon,' . $id,
                'username' => 'required|alpha_dash|unique:users,username,' . $id,
            ]);
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $tutor = User::findOrFail($id);

        $tutor->update($data);

        return redirect()->route('tutor.index')->with('status', 'Tutor berhasil di Perbarui');
    }

    public function akun(){
        $peserta = User::where('id', Auth::user()->id)->first();
        return view('admin_dashboard.pengaturan.akun', ['peserta' => $peserta]);
    }

    public function update_username(Request $request, $id){
        $this->validate($request, [
            'username' => 'required|alpha_dash|unique:users,username,' . $id,
        ]);

        $data = $request->all();
        $user = User::findOrFail($id);
        $user->update($data);

        return redirect('/peserta/akun')->with('status', 'Username berhasil disimpan');
    }

    public function update_password(Request $request, $id){
        $this->validate($request, [
            'password_lama' => 'required',
            'password' => 'required|min:5',
            'konfirmasi_password' => 'required|same:password',
        ]);
        
        $user = User::findOrFail($id);
        if (Hash::check($request->password, $user->password)) { 
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
            
            $user->update($data);
            return redirect('/peserta/akun')->with('status', 'Password berhasil disimpan');
        } else {
            return redirect('/peserta/akun')->with('status', 'Password gagal disimpan');
        }
    }
}
