<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodiData = [
            ['D4 - Teknik Elektronika', 'ALDE ALANDA, S.Kom, M.T'],
            ['Manajemen Informatika D-3', 'ALDO ERIANDA, M.T, S.ST'],
            ['Teknik Komputer D-3', 'CIPTO PRABOWO, S.T, M.T'],
        ];

        foreach ($prodiData as $data) {
            DB::table('prodis')->insert([
                'prodi' => $data[0],
                'kaprodi' => $data[1],
            ]);
        }
    }
}
