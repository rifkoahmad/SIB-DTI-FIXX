<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_peminjaman.index', [
            'peminjaman' => Peminjaman::with('users','barangs','pegawais')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_peminjaman.create', [
            'user' => User::get(),
            'barang' => Barang::get(),
            'pegawai' => Pegawai::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'users_id' => 'required',
            'barangs_id' => 'required',
            'pegawais_id' => 'required',
            'jumlah' => 'required|min:0',
            'tanggal_pinjam' => 'required',
            'lama_pinjam' => 'required'
        ]);


        $peminjaman = Peminjaman::create($data);
        if ($peminjaman) {
            return to_route('peminjaman.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('peminjaman.index')->with('failed', 'Gagal Menambah Data');
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
        return view('admin.a_peminjaman.edit', [
            'peminjaman' => Peminjaman::find($id),
            'user' => User::get(),
            'barang' => Barang::get(),
            'pegawai' => Pegawai::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $data = $request->validate([
            'users_id' => 'required',
            'barangs_id' => 'required',
            'pegawais_id' => 'required',
            'jumlah' => 'required|min:0',
            'tanggal_pinjam' => 'required',
            'lama_pinjam' => 'required'
        ]);

        $peminjaman->update($data);
        if ($peminjaman) {
            return to_route('peminjaman.index')->with('success', 'Berhasil Menyimpan Data');
        } else {
            return to_route('peminjaman.index')->with('failed', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::find($id)->delete();
        if ($peminjaman) {
            return to_route('peminjaman.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('peminjaman.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
