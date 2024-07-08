@extends('kerangka.master')

@section('title', 'Edit Data Mahasiswa')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Data Mahasiswa</h4>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('mahasiswa.index')}}" class="btn btn-secondary ms-4">Back</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                        action="{{ route('mahasiswa.update', $mahasiswa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nama">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" id="nama" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', $mahasiswa->nama) }}" placeholder="Masukkan Nama">
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
                                        <label for="nim">NIM</label>
                                        <div class="position-relative">
                                            <input type="text" id="nim" name="nim"
                                                class="form-control @error('nim') is-invalid @enderror"
                                                value="{{ old('nim', $mahasiswa->nim) }}" placeholder="Masukkan NIM">
                                            @error('nim')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-card-list"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="prodi_id">Program Studi</label>
                                        <div class="position-relative">
                                            <select id="prodi_id" name="prodi_id"
                                                class="form-control @error('prodi_id') is-invalid @enderror">
                                                @foreach ($prodis as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('prodi_id', $mahasiswa->prodi_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->prodi }}</option>
                                                @endforeach
                                            </select>
                                            @error('prodi_id')
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
                                        <label for="angkatan">Angkatan</label>
                                        <div class="position-relative">
                                            <input type="text" id="angkatan" name="angkatan"
                                                class="form-control @error('angkatan') is-invalid @enderror"
                                                value="{{ old('angkatan', $mahasiswa->angkatan) }}"
                                                placeholder="Masukkan Angkatan">
                                            @error('angkatan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="ipk">IPK</label>
                                        <div class="position-relative">
                                            <input type="text" id="ipk" name="ipk"
                                                class="form-control @error('ipk') is-invalid @enderror"
                                                value="{{ old('ipk', $mahasiswa->ipk) }}" placeholder="Masukkan IPK">
                                            @error('ipk')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-bar-chart-line"></i>
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
                                                    <option value="{{ $item->id }}" {{ $item->id == $mahasiswa->users_id ? 'selected' : '' }}>{{ $item->name }}</option>
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
