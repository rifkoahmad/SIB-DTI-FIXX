<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Http\Requests\BeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_berita.index', [
            'berita' => Berita::with('kategori_beritas')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_berita.create', [
            'kategori_berita' => KategoriBerita::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeritaRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('gambar');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/image', $fileName);

        $data['gambar'] = $fileName;

        $beritas = Berita::create($data);
        if ($beritas) {
            return to_route('berita.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('berita.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.a_berita.detail', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.a_berita.edit', [
            'berita' => Berita::find($id),
            'kategori_berita' => KategoriBerita::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeritaRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/image', $fileName);

            if ($request->oldImg) {
                Storage::delete('public/image/' . $request->oldImg);
            }
            $data['gambar'] = $fileName;
        } else {
            $data['gambar'] = $request->oldImg;
        }

        $berita = Berita::find($id)->update($data);
        if ($berita) {
            return to_route('berita.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            return to_route('berita.index')->with('failed', 'Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Berita::find($id);
        Storage::delete('public/image/' . $data->gambar);
        $data->delete();

        if ($id) {
            return to_route('berita.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('berita.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
