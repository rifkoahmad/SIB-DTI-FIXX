<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_pegawai.index', [
            'pegawai' => Pegawai::with('users')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_pegawai.create', [
            'users' => User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PegawaiRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('foto');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/image', $fileName);

        $data['foto'] = $fileName;

        $pegawais = Pegawai::create($data);
        if ($pegawais) {
            return to_route('pegawai.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('pegawai.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.a_pegawai.detail', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.a_pegawai.edit', [
            'pegawai' => Pegawai::find($id),
            'users' => User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, string $id)
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

        $berita = Pegawai::find($id)->update($data);
        if ($berita) {
            return to_route('pegawai.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            return to_route('pegawai.index')->with('failed', 'Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);

        // Check if there are related peminjamen
        if ($pegawai->peminjamen()->exists()) {
            return redirect()->route('pegawai.index')->with('failed', 'Pegawai tidak dapat dihapus karena sedang melakukan peminjaman.');
        }

        // Check if there are related pengembalians that are not returned
        if ($pegawai->pengembalians()->whereNull('tanggal_kembali')->exists()) {
            return redirect()->route('pegawai.index')->with('failed', 'Pegawai tidak dapat dihapus karena belum mengembalikan barang.');
        }

        // Delete the photo from storage if exists
        if ($pegawai->foto) {
            Storage::delete('public/image/' . $pegawai->foto);
        }

        // Delete the pegawai
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Berhasil menghapus data pegawai.');
    }
}
