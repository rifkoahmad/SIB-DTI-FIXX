<?php

namespace App\Http\Controllers\admin;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Mahasiswa;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::get();
        //dd($users);
        return view('admin.a_user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.a_user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:30',
            'roles' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);
        return redirect()->route('user.index')->with('success', 'User berhasil dibuat dengan hak akses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.a_user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::pluck('name', 'name')->all();
        $user = User::find($id);
        //dd($user);
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('admin.a_user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:30',
            'roles' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'roles' => $request->roles,
        ];

        if(!empty($request->password)){
            $data = [
                'password' => Hash::make($request->password),
            ];
        }
        $user = User::find($id);
        //dd($user);
        $user->update($data);
        $user->syncRoles($request->roles);
        return redirect()->route('user.index')->with('success','User berhasil di perbaharui dengan hak akses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

    // Periksa apakah ID user masih digunakan di tabel Mahasiswa atau Pegawai
    $isUsed = Mahasiswa::where('users_id', $id)->exists();
    $isUsed2 = Pegawai::where('users_id', $id)->exists();

    if ($isUsed) {
        return redirect()->route('user.index')->with('failed', 'User tidak dapat dihapus karena masih digunakan di tabel mahasiswa.');
    }
    if ($isUsed2) {
        return redirect()->route('user.index')->with('failed', 'User tidak dapat dihapus karena masih digunakan di tabel pegawai.');
    }

    // Jika tidak digunakan, lanjutkan dengan penghapusan
    $user->delete();

    return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function export()
    {
        $users = User::all();
        return Excel::download(new UserExport($users), 'user.xlsx');
    }

}
