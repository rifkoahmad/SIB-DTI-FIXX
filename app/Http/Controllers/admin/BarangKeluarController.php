<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_barang_keluar.index', [
            'barangkeluar' => BarangKeluar::with('users', 'peminjamen')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_barang_keluar.create', [
            'user' => User::get(),
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
            'tanggal_keluar' => 'required|date',
        ]);

        // Map 'peminjamen_id' to 'users_id' for the 'BarangKeluar' model
        $data['users_id'] = $data['peminjamen_id'];
        unset($data['peminjamen_id']);

        $barangkeluar = BarangKeluar::create($data);
        if ($barangkeluar) {
            return to_route('barangkeluar.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('barangkeluar.index')->with('failed', 'Gagal Menambah Data');
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
        $barangkeluar = BarangKeluar::find($id)->delete();
        if ($barangkeluar) {
            return to_route('barangkeluar.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('barangkeluar.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
