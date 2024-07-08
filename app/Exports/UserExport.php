<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithMapping, WithHeadings
{
    protected $users;
    protected $startIndex = 0; // Deklarasi variabel startIndex

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        return User::all(); // Mengubah dari User::get() menjadi User::all()
    }

    public function map($user): array // Mengubah parameter dari $mahasiswa menjadi $user
    {
        return [
            ++$this->startIndex,
            $user->name,
            $user->email,
            $user->peran,
            $user->password // Perlu dipertimbangkan apakah benar-benar ingin meng-export password
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Email',
            'Peran',
            'Password'
        ];
    }
}
