<?php

namespace App\Exports;

use App\Models\Barang; // Ganti dengan model yang sesuai
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExport implements FromCollection, WithMapping, WithHeadings
{
    protected $barangs;
    protected $startIndex = 0; // Deklarasi variabel startIndex

    public function __construct($barangs)
    {
        $this->barangs = $barangs;
    }

    public function collection()
    {
        return Barang::all(); // Ubah model Mahasiswa menjadi Barang atau sesuaikan dengan model yang digunakan
    }

    public function map($barang): array
{
    $status = $barang->status == 1 ? 'Bagus' : 'Rusak';

    return [
        ++$this->startIndex,
        $barang->nama_barang,
        $barang->kode_barang,
        $barang->stok,
        $barang->foto,
        $status,
        optional($barang->ruangans)->nama_ruangan,
    ];
}

    public function headings(): array
    {
        return [
            'No',
            'Nama Barang',
            'Kode Barang',
            'Stok',
            'Foto',
            'Status',
            'Nama Ruangan',
        ];
    }
}
