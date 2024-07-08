<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosenData = [
            [1, 'ALDE ALANDA, S.Kom, M.T', '198808252015041002',     'dosen', '08123456789', 'alde@pnp.ac.id', ''],
            [2, 'ALDO ERIANDA, M.T, S.ST','198907032019031015',      'dosen', '08123456789', 'aldo@pnp.ac.id', ''],
            [3, 'CIPTO PRABOWO, S.T, M.T', '197403022008121001',     'dosen', '08123456789', 'cipto@pnp.ac.id', ''],
            [4, 'DEDDY PRAYAMA, S.Kom, M.ISD', '198104152006041002', 'dosen', '08123456789', 'deddy@pnp.ac.id', ''],
            [5, 'DEFNI, S.Si, M.Kom', '198112072008122001',          'dosen', '08123456789', 'defni@pnp.ac.id', ''],
            [6, 'DENI SATRIA, S.Kom, M.Kom', '197809282008121002',   'pimpinan', '08123456789', 'dns1st@gmail.com', ''],
            [7, 'DWINY MEIDELFI, S.Kom, M.Cs', '198605092014042001', 'teknisi', '08123456789', 'dwinymeidelfi@pnp.ac.id', ''],
            [8, 'ERVAN ASRI, S.Kom, M.Kom', '197809012008121001',    'teknisi', '08123456789', 'ervan@pnp.ac.id', ''],
        ];

        foreach ($dosenData as $data) {
            DB::table('pegawais')->insert([
                'users_id' => $data[0],
                'nama' => $data[1],
                'nip_nik' => $data[2],
                'jabatan_akademik' => $data[3],
                'no_telepon' => $data[4],
                'email' => $data[5],
                'foto' => $data[6],
            ]);
        }
    }
}
