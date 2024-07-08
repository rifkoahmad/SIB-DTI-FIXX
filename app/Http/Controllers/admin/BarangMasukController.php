<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB untuk transaksi

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangmasuk = BarangMasuk::with('barangs', 'suppliers')->latest()->get();
        return view('admin.a_barang_masuk.index', compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('admin.a_barang_masuk.create', compact('barang', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'barangs_id' => 'required',
            'suppliers_id' => 'required',
            'jumlah_barang' => 'required|integer|min:0',
            'tanggal_masuk' => 'required'
        ]);

        // Gunakan transaksi untuk memastikan konsistensi data
        DB::beginTransaction();

        try {
            $barangmasuk = BarangMasuk::create($data);

            // Update stok barang
            $barang = Barang::findOrFail($data['barangs_id']);
            $barang->stok += $data['jumlah_barang'];
            $barang->save();

            DB::commit();

            return redirect()->route('barangmasuk.index')->with('success', 'Berhasil Menambah Data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('barangmasuk.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('admin.a_barang_masuk.edit', compact('barangmasuk', 'barang', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);

        $data = $request->validate([
            'barangs_id' => 'required',
            'suppliers_id' => 'required',
            'jumlah_barang' => 'required|integer|min:0',
            'tanggal_masuk' => 'required'
        ]);

        // Gunakan transaksi untuk memastikan konsistensi data
        DB::beginTransaction();

        try {
            // Hitung perbedaan jumlah barang untuk update stok
            $difference = $data['jumlah_barang'] - $barangmasuk->jumlah_barang;

            // Update stok barang
            $barang = Barang::findOrFail($data['barangs_id']);
            $barang->stok += $difference;
            $barang->save();

            $barangmasuk->update($data);

            DB::commit();

            return redirect()->route('barangmasuk.index')->with('success', 'Berhasil Menyimpan Data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('barangmasuk.index')->with('failed', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Gunakan transaksi untuk memastikan konsistensi data
        DB::beginTransaction();

        try {
            $barangmasuk = BarangMasuk::findOrFail($id);

            // Kurangi stok barang
            $barang = Barang::findOrFail($barangmasuk->barangs_id);
            $barang->stok -= $barangmasuk->jumlah_barang;
            $barang->save();

            $barangmasuk->delete();

            DB::commit();

            return redirect()->route('barangmasuk.index')->with('success', 'Berhasil Menghapus Data');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('barangmasuk.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
