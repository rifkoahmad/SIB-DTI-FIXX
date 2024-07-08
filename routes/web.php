<?php

use App\Http\Controllers\admin\BarangController;
use App\Http\Controllers\admin\BarangKeluarController;
use App\Http\Controllers\admin\BarangMasukController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KategoriBerita;
use App\Http\Controllers\admin\KategoriBeritaController;
use App\Http\Controllers\admin\MahasiswaController;
use App\Http\Controllers\admin\PegawaiController;
use App\Http\Controllers\admin\PeminjamanController;
use App\Http\Controllers\admin\PengembalianController;
use App\Http\Controllers\admin\ProdiController;
use App\Http\Controllers\admin\RuanganController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile_user', function () {
        return view('admin.a_profile.profile');
    })->name('profile_user');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Barang
    Route::prefix('barang')->group(function () {
        Route::get('/', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/{id}', [BarangController::class, 'show'])->name('barang.show');
        Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/{id}/update', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/{id}/destroy', [BarangController::class, 'destroy'])->name('barang.destroy');
        Route::get('/export', [BarangController::class, 'export'])->name('barang.export');
    });

    // Peminjaman
    Route::prefix('peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::get('/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
        Route::post('/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::get('/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
        Route::put('/{id}/update', [PeminjamanController::class, 'update'])->name('peminjaman.update');
        Route::delete('/{id}/destroy', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    });

    // Pengembalian
    Route::prefix('pengembalian')->group(function () {
        Route::get('/', [PengembalianController::class, 'index'])->name('pengembalian.index');
        Route::get('/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
        Route::post('/store', [PengembalianController::class, 'store'])->name('pengembalian.store');
        Route::get('/{id}/edit', [PengembalianController::class, 'edit'])->name('pengembalian.edit');
        Route::put('/{id}/update', [PengembalianController::class, 'update'])->name('pengembalian.update');
        Route::delete('/{id}/destroy', [PengembalianController::class, 'destroy'])->name('pengembalian.destroy');
    });

    // Admin & Pimpinan Jurusan
    Route::middleware(['role:admin|pimpinanJurusan'])->group(function () {
        // Dashboard
        Route::get('/dashboard_data', function () {
            return view('admin.a_dashboard.dashboard');
        })->name('dashboard');

        // Barang Masuk
        Route::prefix('barang-masuk')->group(function () {
            Route::get('/', [BarangMasukController::class, 'index'])->name('barangmasuk.index');
            Route::get('/create', [BarangMasukController::class, 'create'])->name('barangmasuk.create');
            Route::post('/store', [BarangMasukController::class, 'store'])->name('barangmasuk.store');
            Route::get('/{id}/edit', [BarangMasukController::class, 'edit'])->name('barangmasuk.edit');
            Route::put('/{id}/update', [BarangMasukController::class, 'update'])->name('barangmasuk.update');
            Route::delete('/{id}/destroy', [BarangMasukController::class, 'destroy'])->name('barangmasuk.destroy');
        });

        // Barang Keluar
        Route::prefix('barang-keluar')->group(function () {
            Route::get('/', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
            Route::get('/create', [BarangKeluarController::class, 'create'])->name('barangkeluar.create');
            Route::post('/store', [BarangKeluarController::class, 'store'])->name('barangkeluar.store');
            Route::delete('/{id}/destroy', [BarangKeluarController::class, 'destroy'])->name('barangkeluar.destroy');
        });
    });

    // Admin, Staff, & Dosen
    Route::middleware(['role:admin'])->group(function () {
        // Kategori Berita
        Route::prefix('kategori-berita')->group(function () {
            Route::get('/', [KategoriBeritaController::class, 'index'])->name('kategoriberita.index');
            Route::get('/create', [KategoriBeritaController::class, 'create'])->name('kategoriberita.create');
            Route::post('/store', [KategoriBeritaController::class, 'store'])->name('kategoriberita.store');
            Route::get('/{id}/edit', [KategoriBeritaController::class, 'edit'])->name('kategoriberita.edit');
            Route::patch('/{id}/update', [KategoriBeritaController::class, 'update'])->name('kategoriberita.update');
            Route::delete('/{id}/destroy', [KategoriBeritaController::class, 'destroy'])->name('kategoriberita.destroy');
        });

        // Berita
        Route::prefix('berita')->group(function () {
            Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
            Route::get('/create', [BeritaController::class, 'create'])->name('berita.create');
            Route::post('/store', [BeritaController::class, 'store'])->name('berita.store');
            Route::get('/{id}', [BeritaController::class, 'show'])->name('berita.show');
            Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
            Route::put('/{id}/update', [BeritaController::class, 'update'])->name('berita.update');
            Route::delete('/{id}/destroy', [BeritaController::class, 'destroy'])->name('berita.destroy');
        });
    });

    // Admin & Staff
    Route::middleware(['role:admin'])->group(function () {
        // User
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/{id}/update', [UserController::class, 'update'])->name('user.update');
            Route::delete('/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
            Route::get('/export', [UserController::class, 'export'])->name('user.export');
        });

        // Pegawai/Dosen/Staff
        Route::prefix('pegawai')->group(function () {
            Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.index');
            Route::get('/create', [PegawaiController::class, 'create'])->name('pegawai.create');
            Route::post('/store', [PegawaiController::class, 'store'])->name('pegawai.store');
            Route::get('/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
            Route::get('/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
            Route::put('/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
            Route::delete('/{id}/destroy', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
        });

        // Prodi
        Route::prefix('prodi')->group(function () {
            Route::get('/', [ProdiController::class, 'index'])->name('prodi.index');
            Route::get('/create', [ProdiController::class, 'create'])->name('prodi.create');
            Route::post('/store', [ProdiController::class, 'store'])->name('prodi.store');
            Route::get('/{id}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
            Route::patch('/{id}/update', [ProdiController::class, 'update'])->name('prodi.update');
            Route::delete('/{id}/destroy', [ProdiController::class, 'destroy'])->name('prodi.destroy');
        });

        // Mahasiswa
        Route::prefix('mahasiswa')->group(function () {
            Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
            Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
            Route::post('/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
            Route::get('/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
            Route::get('/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
            Route::put('/{id}/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
            Route::delete('/{id}/destroy', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
            Route::get('/export', [MahasiswaController::class, 'export'])->name('mahasiswa.export');
        });

        // Ruangan
        Route::prefix('ruangan')->group(function () {
            Route::get('/', [RuanganController::class, 'index'])->name('ruangan.index');
            Route::get('/create', [RuanganController::class, 'create'])->name('ruangan.create');
            Route::post('/store', [RuanganController::class, 'store'])->name('ruangan.store');
            Route::get('/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
            Route::patch('/{id}/update', [RuanganController::class, 'update'])->name('ruangan.update');
            Route::delete('/{id}/destroy', [RuanganController::class, 'destroy'])->name('ruangan.destroy');
        });

        // Supplier
        Route::prefix('supplier')->group(function () {
            Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
            Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
            Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
            Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
            Route::patch('/{id}/update', [SupplierController::class, 'update'])->name('supplier.update');
            Route::delete('/{id}/destroy', [SupplierController::class, 'destroy'])->name('supplier.destroy');
        });
    });
});

