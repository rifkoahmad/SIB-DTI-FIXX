<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithMapping, WithHeadings
{
    protected $mahasiswas;
    protected $startIndex = 0; // Deklarasi variabel startIndex

    public function __construct($mahasiswas)
    {
        $this->mahasiswas = $mahasiswas;
    }

    public function collection()
    {
        return Mahasiswa::with('prodis', 'users')->get();
    }

    public function map($mahasiswa): array
    {
        return [
            ++$this->startIndex,
            $mahasiswa->nama,
            $mahasiswa->nim,
            $mahasiswa->angkatan,
            $mahasiswa->ipk,
            optional($mahasiswa->prodis)->prodi,
            optional($mahasiswa->users)->name,
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NIM',
            'Angkatan',
            'IPK',
            'Program Studi',
            'User',
        ];
    }

}
