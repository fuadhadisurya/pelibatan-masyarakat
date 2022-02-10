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
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'level' => 'admin',
                'email' => 'admin@email.com',
                'foto' => '',
                'kontak' => '08123456789',
                'remember_token' => Str::random(60),
            ],
            [
                'nama' => 'Tutor',
                'username' => 'tutor',
                'password' => bcrypt('tutor'),
                'level' => 'tutor',
                'email' => 'tutor@email.com',
                'foto' => '',
                'kontak' => '08123456789',
                'remember_token' => Str::random(60),
            ],
            [
                'nama' => 'Peserta',
                'username' => 'peserta',
                'password' => bcrypt('peserta'),
                'level' => 'peserta',
                'email' => 'peserta@email.com',
                'foto' => '',
                'kontak' => '08123456789',
                'remember_token' => Str::random(60),
            ],
        ]);
        foreach($users as $user){
            User::create($user);
        }
    }
}
