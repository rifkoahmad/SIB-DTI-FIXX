<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat peran
        $adminRole = Role::create(['name' => 'admin']);
        $pimpinanJurusanRole = Role::create(['name' => 'pimpinanJurusan']);
        $staffRole = Role::create(['name' => 'staff']);
        $dosenRole = Role::create(['name' => 'dosen']);
        $mahasiswaRole = Role::create(['name' => 'mahasiswa']);

        // Data dosen
        $dosenData = [
            ['ALDE ALANDA, S.Kom, M.T', 'alde@pnp.ac.id'],
            ['ALDO ERIANDA, M.T, S.ST', 'aldo@pnp.ac.id'],
            ['CIPTO PRABOWO, S.T, M.T', 'cipto@pnp.ac.id'],
            ['DEDDY PRAYAMA, S.Kom, M.ISD', 'deddy@pnp.ac.id'],
            ['DEFNI, S.Si, M.Kom', 'defni@pnp.ac.id'],
        ];

        foreach ($dosenData as $data) {
            $user = User::create([
                'name' => $data[0],
                'email' => $data[1],
                'password' => Hash::make('12345678'), // Ganti 'password' dengan password yang sesuai
            ]);
            $user->assignRole($dosenRole);
        }

        // Data pimpinan
        $dataPimpinan = [
            ['DENI SATRIA, S.Kom, M.Kom', 'dns1st@gmail.com'],
        ];

        foreach ($dataPimpinan as $data) {
            $user = User::create([
                'name' => $data[0],
                'email' => $data[1],
                'password' => Hash::make('12345678'), // Ganti 'password' dengan password yang sesuai
            ]);
            $user->assignRole($pimpinanJurusanRole);
        }

        // Data teknisi
        $teknisiData = [
            ['DWINY MEIDELFI, S.Kom, M.Cs', 'dwinymeidelfi@pnp.ac.id'],
            ['ERVAN ASRI, S.Kom, M.Kom', 'ervan@pnp.ac.id'],
        ];

        foreach ($teknisiData as $data) {
            $user = User::create([
                'name' => $data[0],
                'email' => $data[1],
                'password' => Hash::make('12345678'), // Ganti 'password' dengan password yang sesuai
            ]);
            $user->assignRole($staffRole); // Assign sebagai staff
        }

        // Data mahasiswa
        $dataMahasiswa = [
            ['Wara Ulan Saputri', 'Wara@gmail.com'],
            ['Silvia Angraini', 'Silvia@gmail.com'],
            ['Dea Annona Prayetno Putri', 'Dea@gmail.com'],
            ['Yulia Ramadhani', 'Yulia@gmail.com'],
            ['Syahrul Gusti Hafendi', 'Syahrul@gmail.com'],
            ['Rendhika Aditya', 'Rendhika@gmail.com'],
            ['Hexa Aristia', 'Hexa@gmail.com'],
            ['Novelia Desrina Putri', 'Novelia@gmail.com'],
            ['Fauziah Wulandari', 'Fauziah@gmail.com'],
            ['Ira Agustiana', 'Ira@gmail.com'],
            ['DEDE RAHMAN', 'DEDE@gmail.com'],
            ['Farhan Hafifi', 'Farhan@gmail.com'],
            ['Zulmaidi', 'Zulmaidi@gmail.com'],
            ['HADITYA HANAFI', 'HADITYA@gmail.com'],
            ['Roberto Firman', 'Roberto@gmail.com'],
            ['Yenni Wati', 'Yenni@gmail.com'],
            ['PM RIEFKY MUHAMMAD FARHAN', 'PM@gmail.com'],
            ['Deo Febrino Mudri', 'Deo@gmail.com'],
        ];

        foreach ($dataMahasiswa as $data) {
            $user = User::create([
                'name' => $data[0],
                'email' => $data[1],
                'password' => Hash::make('12345678'),
            ]);
            $user->assignRole($mahasiswaRole);
        }

        // Mengaitkan peran dengan pengguna
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $adminUser->assignRole($adminRole);
    }
}
