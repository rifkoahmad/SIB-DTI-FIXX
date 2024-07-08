<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_prodi.index', [
            'prodi' => Prodi::orderBy('id','asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'prodi' => 'required|min:8',
            'kaprodi' => 'required|min:8'
        ]);

        $prodi = Prodi::create($data);
        if ($prodi) {
            return to_route('prodi.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('prodi.index')->with('failed', 'Gagal Menambah Data');
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
        $prodi = Prodi::findOrFail($id);
        return view('admin.a_prodi.edit',compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prodi = Prodi::findOrFail($id);

        $data = $request->validate([
            'prodi' => 'required|min:8',
            'kaprodi' => 'required|min:8'
        ]);

        $prodi->update($data);
        if ($prodi) {
            return to_route('prodi.index')->with('success', 'Berhasil Menyimpan Data');
        } else {
            return to_route('prodi.index')->with('failed', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::find($id)->delete();
        if ($prodi) {
            return to_route('prodi.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('prodi.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
