@extends('kerangka.master')
@section('title', 'Edit Data Pengguna')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Data Pengguna</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                        action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="name">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama">
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
                                                value="{{ old('email', $user->email) }}" placeholder="Masukkan Email">
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
                                            <option value="">Pilih Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}"
                                                    {{ in_array($role, $userRoles) ? 'selected' : '' }}>{{ $role }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-check"></i> <!-- Icon untuk peran -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password">Password</label>
                                    <div class="position-relative">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="" placeholder="Masukkan Password">
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
