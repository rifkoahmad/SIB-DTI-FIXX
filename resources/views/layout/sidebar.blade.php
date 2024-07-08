{{-- sidebar --}}

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('profile_user') }}"><img src="{{ asset('template/assets/images/logo/logo.svg') }}"
                            alt="Logo" srcset=""></a>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @hasanyrole('admin|pimpinanJurusan|staff|dosen|mahasiswa')
                    @hasanyrole('admin|pimpinanJurusan')
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item">
                            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-speedometer2"></i> <!-- Icon untuk Dashboard -->
                                <span>Dashboard</span>
                            </a>
                        </li>
                    @endhasanyrole
                    <li class="sidebar-title">Manajemen Barang</li>
                    <li class="sidebar-item">
                        <a href="{{ route('barang.index') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-down-circle-fill"></i> <!-- Icon untuk Barang Masuk -->
                            <span>Barang</span>
                        </a>
                    </li>
                    @hasanyrole('admin|pimpinanJurusan')
                    <li class="sidebar-item">
                        <a href="{{ route('barangmasuk.index') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-down-circle-fill"></i> <!-- Icon untuk Barang Masuk -->
                            <span>Barang Masuk</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('barangkeluar.index') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-up-circle-fill"></i> <!-- Icon untuk Barang Keluar -->
                            <span>Barang Keluar</span>
                        </a>
                    </li>
                    @endhasanyrole
                    @hasrole('admin')
                        <li class="sidebar-item">
                            <a href="{{ route('supplier.index') }}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i> <!-- Icon untuk Supplier -->
                                <span>Supplier</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('ruangan.index') }}" class='sidebar-link'>
                                <i class="bi bi-arrow-down-circle-fill"></i> <!-- Icon untuk Barang Masuk -->
                                <span>Ruangan</span>
                            </a>
                        </li>
                    @endhasrole
                    @hasanyrole('admin|staff|dosen|mahasiswa')
                    <li class="sidebar-title">Manajemen Peminjaman</li>
                    <li class="sidebar-item">
                        <a href="{{ route('peminjaman.index') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-down-circle"></i> <!-- Icon untuk Peminjaman -->
                            <span>Peminjaman</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('pengembalian.index') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-up-circle"></i> <!-- Icon untuk Pengembalian -->
                            <span>Pengembalian</span>
                        </a>
                    </li>
                    @endhasanyrole
                    @hasrole('admin')
                        <li class="sidebar-title">Manajemen Berita</li>
                        <li class="sidebar-item ">
                            <a href="{{ route('kategoriberita.index') }}" class='sidebar-link'>
                                <i class="bi bi-tags-fill"></i> <!-- Icon untuk Kategori Berita -->
                                <span>Kategori Berita</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('berita.index') }}" class='sidebar-link'>
                                <i class="bi bi-newspaper"></i> <!-- Icon untuk Berita -->
                                <span>Berita</span>
                            </a>
                        </li>
                    @endhasrole

                    @hasrole('admin')
                        <li class="sidebar-title">Manajemen Pengguna</li>
                        <li class="sidebar-item">
                            <a href="{{ route('user.index') }}" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i> <!-- Icon untuk User -->
                                <span>User</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('pegawai.index') }}" class='sidebar-link'>
                                <i class="bi bi-person-workspace"></i> <!-- Icon untuk Dosen -->
                                <span>Dosen</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('mahasiswa.index') }}" class='sidebar-link'>
                                <i class="bi bi-person"></i> <!-- Icon untuk Mahasiswa -->
                                <span>Mahasiswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('prodi.index') }}" class='sidebar-link'>
                                <i class="bi bi-tags-fill"></i> <!-- Icon untuk Mahasiswa -->
                                <span>Prodi</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Aktivitas</li>
                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-clock-history"></i> <!-- Icon untuk Log Aktivitas -->
                                <span>Log Aktivitas</span>
                            </a>
                        </li>
                    @endhasrole
                    <li class="sidebar-item">
                        <a href="{{ route('admin.logout') }}" class='sidebar-link btn btn-danger btn-sm'>
                            <i class="bi bi-box-arrow-left"></i> <!-- Icon untuk Log Aktivitas -->
                            <span>Logout</span>
                        </a>
                    </li>
                @endhasanyrole
            </ul>
        </div>
    </div>
</div>
