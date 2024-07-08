@extends('kerangka.master')
@section('title', 'Tambah Data Pengguna')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Tambah Data Pengguna</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                        action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="name">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" placeholder="Masukkan Nama">
                                            @error('name')
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
                                        <label for="email">Email</label>
                                        <div class="position-relative">
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="Masukkan Email">
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
                                        <label for="roles[]" class="form-label">Roles</label>
                                        <select name="roles[]" class="form-control" multiple>
                                            <option value="" disabled selected>Pilih Role</option>
                                            @foreach ($roles as $role)
                                                <option class="mb-2" value="{{ $role }}">{{ $role }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- <label for="peran">Peran</label>
                                        <select id="peran" name="peran"
                                            class="form-control @error('peran') is-invalid @enderror">
                                            <option value="">Pilih Role</option>
                                            <option value="admin" {{ old('peran') == 'Admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="pimpinan" {{ old('peran') == 'Pimpinan' ? 'selected' : '' }}>
                                                Pimpinan</option>
                                            <option value="dosen" {{ old('peran') == 'Dosen' ? 'selected' : '' }}>Dosen
                                            </option>
                                            <option value="staff" {{ old('peran') == 'Staff' ? 'selected' : '' }}>Staff
                                            </option>
                                            <option value="mahasiswa" {{ old('peran') == 'Mahasiswa' ? 'selected' : '' }}>
                                                Mahasiswa</option>
                                        </select> --}}
                                        @error('roles')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password">Password</label>
                                    <div class="position-relative">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan Password">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                <a href="{{ route('user.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
                            </div>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
