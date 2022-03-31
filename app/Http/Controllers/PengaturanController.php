<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function profil(){
        $peserta = User::where('id', Auth::user()->id)->first();
        return view('admin_dashboard.pengaturan.profil', ['peserta' => $peserta]);
    }

    public function update_profil(Request $request){
        // dd($request);

        $id = Auth::user()->id;
        if ($request->foto) {
            $this->validate($request, [
                // 'foto' => ,
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'nomor_telepon' => 'required|numeric|unique:users,nomor_telepon,' . $id,
                'email' => 'required|email|unique:users,email,' . $id,
                'tipe_anggota' => 'required',
                'provinsi' => 'required',
                'kabupaten_kota' => 'required',
                'kecamatan' => 'required',
                'desa_kelurahan' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'nomor_telepon' => 'required|numeric|unique:users,nomor_telepon,' . $id,
                'email' => 'required|email|unique:users,email,' . $id,
                'tipe_anggota' => 'required',
                'provinsi' => 'required',
                'kabupaten_kota' => 'required',
                'kecamatan' => 'required',
                'desa_kelurahan' => 'required',
            ]);
        }
        $data = $request->all();
        $data['status'] = "Sudah Verifikasi";
        $tutor = User::findOrFail($id);
        $tutor->update($data);

        if (Auth::user()->level == "admin") {
            return redirect('/admin/profil')->with('status', 'Profil Berhasil diperbarui');
        } elseif (Auth::user()->level == "tutor") {
            return redirect('/tutor/profil')->with('status', 'Profil berhasil diperbarui');
        } else {
            return redirect('/peserta/profil')->with('status', 'Profil berhasil diperbarui');
        }
    }

    public function akun(){
        $peserta = User::where('id', Auth::user()->id)->first();
        return view('admin_dashboard.pengaturan.akun', ['peserta' => $peserta]);
    }

    public function update_akun(Request $request){
        $id = Auth::user()->id;
        if($request->username){
            $this->validate($request, [
                'username' => 'required|alpha_dash|unique:users,username,' . $id,
            ]);

            $data = $request->all();
            $user = User::findOrFail($id);
            $user->update($data);

            if (Auth::user()->level == "admin") {
                return redirect('/admin/akun')->with('status', 'Username berhasil disimpan');
            } elseif (Auth::user()->level == "tutor") {
                return redirect('/tutor/akun')->with('status', 'Username berhasil disimpan');
            } else {
                return redirect('/peserta/akun')->with('status', 'Username berhasil disimpan');
            }
        } elseif($request->password) {
            $this->validate($request, [
                'password_lama' => 'required',
                'password' => 'required|min:6',
                'konfirmasi_password' => 'required|same:password',
            ]);

            $user = User::findOrFail($id);
            if (Hash::check($request->password_lama, $user->password)) { 
                $data = $request->all();
                $data['password'] = bcrypt($request->password);
                
                $user->update($data);
                if (Auth::user()->level == "admin") {
                    return redirect('/admin/akun')->with('status', 'Password berhasil disimpan');
                } elseif (Auth::user()->level == "tutor") {
                    return redirect('/tutor/akun')->with('status', 'Password berhasil disimpan');
                } else {
                    return redirect('/peserta/akun')->with('status', 'Password berhasil disimpan');
                }
            } else {
                if (Auth::user()->level == "admin") {
                    return redirect('/admin/akun')->with('error', 'Password lama salah');
                } elseif (Auth::user()->level == "tutor") {
                    return redirect('/tutor/akun')->with('error', 'Password lama salah');
                } else {
                    return redirect('/peserta/akun')->with('error', 'Password lama salah');
                }
            }
        } else {
            if (Auth::user()->level == "admin") {
                return redirect('/admin/akun')->with('status', 'Proses pengubahan tidak berhasil');
            } elseif (Auth::user()->level == "tutor") {
                return redirect('/tutor/akun')->with('status', 'Proses pengubahan tidak berhasil');
            } else {
                return redirect('/peserta/akun')->with('status', 'Proses pengubahan tidak berhasil');
            }
        }
    }
}
