<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_pengembalian.index', [
            'pengembalian' => Pengembalian::with('users', 'peminjamen','pegawais')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_pengembalian.create', [
            'user' => User::get(),
            'pegawai' => Pegawai::get(),
            'peminjaman' => Peminjaman::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'peminjamen_id' => 'required',
            'pegawais_id' => 'required',
            'tanggal_kembali' => 'required|date',
        ]);

        // Map 'peminjamen_id' to 'users_id' for the 'BarangKeluar' model
        $data['users_id'] = $data['peminjamen_id'];
        unset($data['pengembalian_id']);

        $pengembalian = Pengembalian::create($data);
        if ($pengembalian) {
            return to_route('pengembalian.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('pengembalian.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengembalian = Pengembalian::find($id)->delete();
        if ($pengembalian) {
            return to_route('pengembalian.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('pengembalian.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
