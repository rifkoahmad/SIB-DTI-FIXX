<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_supplier.index', [
            'supplier' => Supplier::orderBy('id','asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_supplier' => 'required|min:8',
            'telepon_supplier' => 'required|min:11'
        ]);

        $supplier = Supplier::create($data);
        if ($supplier) {
            return to_route('supplier.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('supplier.index')->with('failed', 'Gagal Menambah Data');
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
        $supplier = Supplier::findOrFail($id);
        return view('admin.a_supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);

        $data = $request->validate([
            'nama_supplier' => 'required|min:8',
            'telepon_supplier' => 'required|min:11'
        ]);

        $supplier->update($data);
        if ($supplier) {
            return to_route('supplier.index')->with('success', 'Berhasil Menyimpan Data');
        } else {
            return to_route('supplier.index')->with('failed', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id)->delete();
        if ($supplier) {
            return to_route('supplier.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('supplier.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
