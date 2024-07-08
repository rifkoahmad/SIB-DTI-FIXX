<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_ruangan.index', [
            'ruangan' => Ruangan::orderBy('id','asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_ruangan' => 'required|min:3',
            'gedung' => 'required|min:1'
        ]);


        $ruangan = Ruangan::create($data);
        if ($ruangan) {
            return to_route('ruangan.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('ruangan.index')->with('failed', 'Gagal Menambah Data');
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
        $ruangan = Ruangan::findOrFail($id);
        return view('admin.a_ruangan.edit',compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $data = $request->validate([
            'nama_ruangan' => 'required|min:3',
            'gedung' => 'required|min:1'
        ]);

        $ruangan->update($data);
        if ($ruangan) {
            return to_route('ruangan.index')->with('success', 'Berhasil Menyimpan Data');
        } else {
            return to_route('ruangan.index')->with('failed', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = Ruangan::find($id)->delete();
        if ($ruangan) {
            return to_route('ruangan.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('ruangan.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
