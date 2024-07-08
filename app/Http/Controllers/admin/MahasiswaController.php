<?php

namespace App\Http\Controllers\admin;

use App\Exports\MahasiswaExport;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Maatwebsite\Excel\Facades\Excel; // Sesuaikan namespace untuk Excel facade

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $mahasiswa = Mahasiswa::with('prodis', 'users')->latest()->get();
    //     return view('admin.a_mahasiswa.index', compact('mahasiswa'));
    // }

    public function index(Request $request)
    {
        // Mengambil data filter dari request
        $nama = $request->input('nama');
        $nim = $request->input('nim');
        $angkatan = $request->input('angkatan');
        $prodi = $request->input('prodi');

        // Query dasar
        $query = Mahasiswa::query();

        // Menambahkan kondisi filter jika ada
        if ($nama) {
            $query->where('nama', 'like', '%' . $nama . '%');
        }
        if ($nim) {
            $query->where('nim', 'like', '%' . $nim . '%');
        }
        if ($angkatan) {
            $query->where('angkatan', $angkatan);
        }
        if ($prodi) {
            $query->where('prodi_id', $prodi);
        }

        // Mendapatkan hasil query dengan pagination
        $mahasiswa = $query->with('prodis')->paginate(10);

        // Mengambil daftar program studi untuk filter
        $prodis = Prodi::all();

        // Mengembalikan view dengan data mahasiswa dan program studi
        return view('admin.a_mahasiswa.index', compact('mahasiswa', 'prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::get();
        $users = User::get();
        return view('admin.a_mahasiswa.create', compact('prodis', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MahasiswaRequest $request)
    {
        $data = $request->validated();

        $mahasiswa = Mahasiswa::create($data);
        if ($mahasiswa) {
            return redirect()->route('mahasiswa.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return redirect()->route('mahasiswa.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.a_mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $prodis = Prodi::get();
        $users = User::get();
        return view('admin.a_mahasiswa.edit', compact('mahasiswa', 'prodis', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, $id)
    {
        $data = $request->validated();

        $mahasiswa = Mahasiswa::find($id);
        $updated = $mahasiswa->update($data);
        if ($updated) {
            return redirect()->route('mahasiswa.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            return redirect()->route('mahasiswa.index')->with('failed', 'Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $deleted = $mahasiswa->delete();

        if ($deleted) {
            return redirect()->route('mahasiswa.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return redirect()->route('mahasiswa.index')->with('failed', 'Gagal Menghapus Data');
        }
    }

    /**
     * Export data to Excel.
     */
    public function export()
    {
        $mahasiswas = Mahasiswa::all();
        return Excel::download(new MahasiswaExport($mahasiswas), 'mahasiswa.xlsx');
    }
}

