<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
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
    // Validasi input data
    $data = $request->validate([
        'peminjamen_id' => 'required|exists:peminjamen,id',
        'tanggal_keluar' => 'required|date',
    ]);

    // Cari entri peminjaman terkait
    $peminjaman = Peminjaman::find($data['peminjamen_id']);
    if ($peminjaman) {
        // Kurangi stok barang
        $barang = Barang::find($peminjaman->barangs_id);
        if ($barang) {
            $barang->stok -= $peminjaman->jumlah; // Mengurangi stok barang sesuai jumlah peminjaman
            $barang->save();
        }

        // Buat BarangKeluar baru dengan data yang telah diubah
        $barangKeluar = BarangKeluar::create([
            'users_id' => $peminjaman->id, // Menggunakan id dari peminjaman sebagai users_id
            'tanggal_keluar' => $data['tanggal_keluar'],
        ]);

        // Redirect atau respons sesuai kebutuhan
        return redirect()->route('barangkeluar.index')->with('success', 'Data Barang Keluar berhasil disimpan.');
    }

    // Jika peminjaman tidak ditemukan
    return redirect()->route('barangkeluar.index')->with('error', 'Peminjaman tidak ditemukan.');
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
   /**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    // Cari data BarangKeluar yang akan dihapus
    $barangKeluar = BarangKeluar::find($id);
    if ($barangKeluar) {
        // Ambil peminjaman terkait untuk menambah stok kembali
        $peminjaman = Peminjaman::find($barangKeluar->users_id);
        if ($peminjaman) {
            $barang = Barang::find($peminjaman->barangs_id);
            if ($barang) {
                $barang->stok += $peminjaman->jumlah; // Mengembalikan stok barang sesuai jumlah peminjaman
                $barang->save();
            }
        }

        $barangKeluar->delete();
        return redirect()->route('barangkeluar.index')->with('success', 'Berhasil Menghapus Data');
    } else {
        return redirect()->route('barangkeluar.index')->with('failed', 'Gagal Menghapus Data');
    }
}

}
