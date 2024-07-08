@extends('kerangka.master')
@section('title', 'Tambah Data Pegawai')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Tambah Data Pegawai</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('pegawai.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nama">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="users_id">Akun</label>
                                        <div class="position-relative">
                                            <select id="users_id" name="users_id" class="form-control @error('users_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Akun--</option>
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}" {{ old('users_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('users_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-tags"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nip_nik">NIP/NIK</label>
                                        <div class="position-relative">
                                            <input type="text" id="nip_nik" name="nip_nik" class="form-control @error('nip_nik') is-invalid @enderror" value="{{ old('nip_nik') }}" placeholder="Masukkan NIP/NIK">
                                            @error('nip_nik')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-credit-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="jabatan_akademik">Jabatan Akademik</label>
                                        <div class="position-relative">
                                            <input type="text" id="jabatan_akademik" name="jabatan_akademik" class="form-control @error('jabatan_akademik') is-invalid @enderror" value="{{ old('jabatan_akademik') }}" placeholder="Masukkan Jabatan Akademik">
                                            @error('jabatan_akademik')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-journal-richtext"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="no_telepon">No Telepon</label>
                                        <div class="position-relative">
                                            <input type="text" id="no_telepon" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon') }}" placeholder="Masukkan No Telepon">
                                            @error('no_telepon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email">Email</label>
                                        <div class="position-relative">
                                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan Email">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="foto" class="form-label">Foto</label>
                                        <div class="position-relative">
                                            <input class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" type="file">
                                            @error('foto')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-camera"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
