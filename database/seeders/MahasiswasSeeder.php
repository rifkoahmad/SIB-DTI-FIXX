<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaData = [
            [9,  'Wara Ulan Saputri', '1701091031',  2020, 3.70],
            [10, 'Silvia Angraini', '1701081035',  2020, 3.70],
            [11, 'Dea Annona Prayetno Putri', '1701091033',  2020, 3.70],
            [12, 'Yulia Ramadhani', '1701091018',  2020, 3.70],
            [13, 'Syahrul Gusti Hafendi', '1701081027',  2020, 3.70],
            [14, 'Rendhika Aditya', '1701082019',  2020, 3.70],
            [15, 'Hexa Aristia', '1701092022',  2020, 3.70],
            [16, 'Novelia Desrina Putri', '1701092016',  2020, 3.70],
            [17, 'Fauziah Wulandari',  '1701091019', 2020, 3.70],
            [18, 'Ira Agustiana',  '1701092021', 2021, 3.70],
            [19, 'DEDE RAHMAN',  '1701081015', 2021, 3.70],
            [20, 'Farhan Hafifi',  '1701082012', 2021, 3.70],
            [21, 'Zulmaidi',  '1701081034', 2021, 3.70],
            [22, 'HADITYA HANAFI',  '1701082017', 2022, 3.70],
            [23, 'Roberto Firman',  '1701081010', 2022, 3.70],
            [24, 'Yenni Wati',  '1701091010', 2022, 3.70],
            [25, 'PM RIEFKY MUHAMMAD FARHAN',  '1701082013', 2022, 3.70],
            [26, 'Deo Febrino Mudri',  '1701081029', 2022, 3.70],
        ];

        foreach ($mahasiswaData as $data) {
            DB::table('mahasiswas')->insert([
                'users_id' => $data[0],
                'nama' => $data[1],
                'nim' => $data[2],
                'angkatan' => $data[3],
                'ipk' => $data[4],
                'prodi_id' => rand(1, 3),
            ]);
        }
    }
}
