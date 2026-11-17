<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $akun = [
            ['Admin Akademik',  'admin@akademik.test',     'admin'],
            ['Dosen Akademik',  'dosen@akademik.test',     'dosen'],
            ['Mahasiswa Satu',  'mahasiswa@akademik.test', 'mahasiswa'],
        ];

        foreach ($akun as [$nama, $email, $role]) {
            // role tidak ada di $fillable: ditetapkan oleh sistem, bukan dari input pengguna
            $user = new User(['name' => $nama, 'email' => $email, 'password' => 'password']);
            $user->forceFill(['role' => $role])->save();
        }
    }
}
