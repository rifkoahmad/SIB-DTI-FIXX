<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
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
        $pengembalian = Pengembalian::with('users', 'peminjamen', 'pegawais')->latest()->get();
        return view('admin.a_pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $pegawai = Pegawai::all();
        $peminjaman = Peminjaman::all();
        return view('admin.a_pengembalian.create', compact('user', 'pegawai', 'peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'peminjamen_id' => 'required|exists:peminjaman,id',
            'pegawais_id' => 'required|exists:pegawais,id',
            'tanggal_kembali' => 'required|date',
        ]);

        // Cari peminjaman terkait
        $peminjaman = Peminjaman::find($data['peminjamen_id']);
        if (!$peminjaman) {
            return redirect()->route('pengembalian.index')->with('failed', 'Peminjaman tidak ditemukan.');
        }

        // Kurangi stok barang yang dikembalikan
        $barang = Barang::find($peminjaman->barangs_id);
        if ($barang) {
            $barang->stok += $peminjaman->jumlah; // Tambahkan kembali stok barang sesuai jumlah yang dikembalikan
            $barang->save();
        }

        // Buat entri Pengembalian baru dengan data yang diterima
        $pengembalian = Pengembalian::create([
            'users_id' => $data['pegawais_id'], // Gunakan ID pegawai sebagai users_id (jika memang demikian)
            'peminjamen_id' => $data['peminjamen_id'],
            'tanggal_kembali' => $data['tanggal_kembali'],
        ]);

        if ($pengembalian) {
            return redirect()->route('pengembalian.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return redirect()->route('pengembalian.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengembalian = Pengembalian::find($id);
        if (!$pengembalian) {
            return redirect()->route('pengembalian.index')->with('failed', 'Data Pengembalian tidak ditemukan.');
        }

        // Tambahkan kembali stok barang yang dikembalikan sebelum menghapus pengembalian
        $peminjaman = Peminjaman::find($pengembalian->peminjamen_id);
        if ($peminjaman) {
            $barang = Barang::find($peminjaman->barangs_id);
            if ($barang) {
                $barang->stok -= $peminjaman->jumlah;
                $barang->save();
            }
        }

        // Hapus pengembalian
        if ($pengembalian->delete()) {
            return redirect()->route('pengembalian.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return redirect()->route('pengembalian.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
