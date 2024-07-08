@extends('kerangka.master')
@section('title', 'Edit Data Pegawai')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Data Pegawai</h4>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('pegawai.index')}}" class="btn btn-secondary ms-4">Back</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('pegawai.update', $pegawai->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="oldImg" value="{{ $pegawai->foto }}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nama">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $pegawai->nama) }}" placeholder="Masukkan Nama">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
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
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $pegawai->users_id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                            <input type="text" id="nip_nik" name="nip_nik" class="form-control @error('nip_nik') is-invalid @enderror" value="{{ old('nip_nik', $pegawai->nip_nik) }}" placeholder="Masukkan NIP/NIK">
                                            @error('nip_nik')
                                                <div class="invalid-feedback">{{ $message }}</div>
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
                                            <input type="text" id="jabatan_akademik" name="jabatan_akademik" class="form-control @error('jabatan_akademik') is-invalid @enderror" value="{{ old('jabatan_akademik', $pegawai->jabatan_akademik) }}" placeholder="Masukkan Jabatan Akademik">
                                            @error('jabatan_akademik')
                                                <div class="invalid-feedback">{{ $message }}</div>
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
                                            <input type="text" id="no_telepon" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon', $pegawai->no_telepon) }}" placeholder="Masukkan No Telepon">
                                            @error('no_telepon')
                                                <div class="invalid-feedback">{{ $message }}</div>
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
                                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $pegawai->email) }}" placeholder="Masukkan Email">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
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
                                            <div class="mt-1">
                                                <small>Foto Lama</small><br>
                                                <img src="{{ asset('storage/image/' . $pegawai->foto) }}" alt="" width="200px">
                                            </div>
                                            @error('foto')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
