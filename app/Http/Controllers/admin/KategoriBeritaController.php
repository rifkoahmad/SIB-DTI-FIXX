<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_kategori_berita.index', [
            'kategori' => KategoriBerita::orderBy('id','asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_kategori_berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|min:5'
        ]);

        $data['slug'] = Str::slug($data['nama']);

        $kategori = KategoriBerita::create($data);
        if ($kategori) {
            return to_route('kategoriberita.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('kategoriberita.index')->with('failed', 'Gagal Menambah Data');
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
        $kategori = KategoriBerita::findOrFail($id);
        return view('admin.a_kategori_berita.update',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = KategoriBerita::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|min:5'
        ]);

        $data['slug'] = Str::slug($data['nama']);

        $kategori->update($data);
        if ($kategori) {
            return to_route('kategoriberita.index')->with('success', 'Berhasil Menyimpan Data');
        } else {
            return to_route('kategoriberita.index')->with('failed', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriBerita::find($id)->delete();
        if ($kategori) {
            return to_route('kategoriberita.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('kategoriberita.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
