<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = ([
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'email' => 'admin@email.com',
                'level' => 'admin',
                'nama' => 'Admin',
                // 'jenis_kelamin' => '',
                // 'tempat_lahir' => '',
                // 'tanggal_lahir' => '',
                // 'foto' => '',
                // 'nomor_telepon' => '08123456789',
                // 'provinsi' => '',
                // 'kabupaten_kota' => '',
                // 'kecamatan' => '',
                // 'desa_kelurahan' => '',
                // 'alamat' => '',
                // 'tipe_anggota' => '',
                'status' => 'Sudah verifikasi',
                'remember_token' => Str::random(60),
            ],
            [
                'username' => 'tutor',
                'password' => bcrypt('tutor'),
                'email' => 'tutor@email.com',
                'level' => 'tutor',
                'nama' => 'Tutor',
                // 'jenis_kelamin' => '',
                // 'tempat_lahir' => '',
                // 'tanggal_lahir' => '',
                // 'foto' => '',
                // 'nomor_telepon' => '08123456789',
                // 'provinsi' => '',
                // 'kabupaten_kota' => '',
                // 'kecamatan' => '',
                // 'desa_kelurahan' => '',
                // 'alamat' => '',
                // 'tipe_anggota' => '',
                'status' => 'Sudah verifikasi',
                'remember_token' => Str::random(60),
            ],
            [
                'username' => 'peserta',
                'password' => bcrypt('peserta'),
                'email' => 'peserta@email.com',
                'level' => 'peserta',
                'nama' => 'Peserta',
                // 'jenis_kelamin' => '',
                // 'tempat_lahir' => '',
                // 'tanggal_lahir' => '',
                // 'foto' => '',
                // 'nomor_telepon' => '08123456789',
                // 'provinsi' => '',
                // 'kabupaten_kota' => '',
                // 'kecamatan' => '',
                // 'desa_kelurahan' => '',
                // 'alamat' => '',
                // 'tipe_anggota' => '',
                'status' => 'Belum verifikasi',
                'remember_token' => Str::random(60),
            ],
        ]);
        foreach($users as $user){
            User::create($user);
        }
    }
}
