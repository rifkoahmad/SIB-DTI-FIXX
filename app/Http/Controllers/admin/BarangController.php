<?php

namespace App\Http\Controllers\admin;

use App\Exports\BarangExport;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Barang::with('ruangans')->latest();

    if ($request->nama_barang) {
        $query->where('nama_barang', 'like', '%' . $request->nama_barang . '%');
    }

    if ($request->kode_barang) {
        $query->where('kode_barang', 'like', '%' . $request->kode_barang . '%');
    }

    if ($request->status !== null) {
        $query->where('status', $request->status);
    }

    $barang = $query->get();
    return view('admin.a_barang.index', compact('barang'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_barang.create', [
            'ruangan' => Ruangan::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('foto');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/image', $fileName);

        $data['foto'] = $fileName;

        $barangs = Barang::create($data);
        if ($barangs) {
            return to_route('barang.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('barang.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.a_barang.detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.a_barang.edit', [
            'barang' => Barang::find($id),
            'ruangan' => Ruangan::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/image', $fileName);

            if ($request->oldImg) {
                Storage::delete('public/image/' . $request->oldImg);
            }
            $data['foto'] = $fileName;
        } else {
            $data['foto'] = $request->oldImg;
        }

        $barang = Barang::find($id)->update($data);
        if ($barang) {
            return to_route('barang.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            return to_route('barang.index')->with('failed', 'Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Barang::find($id);
        Storage::delete('public/image/' . $data->foto);
        $data->delete();

        if ($id) {
            return to_route('barang.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('barang.index')->with('failed', 'Gagal Menghapus Data');
        }
    }

    public function export()
    {
        $barangs = Barang::all();
        return Excel::download(new BarangExport($barangs), 'barang.xlsx');
    }
}
