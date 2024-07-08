@extends('kerangka.master')
@section('title', 'Tambah Data Prodi')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Tambah Data Prodi</h4>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('prodi.index')}}" class="btn btn-secondary ms-4">Back</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('prodi.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="prodi">Prodi</label>
                                        <div class="position-relative">
                                            <input type="text" id="prodi" name="prodi" class="form-control @error('prodi') is-invalid @enderror"
                                                value="{{ old('prodi') }}" placeholder="Masukkan Prodi">
                                            @error('prodi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-file-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="kaprodi">Kaprodi</label>
                                        <div class="position-relative">
                                            <input type="text" id="kaprodi" name="kaprodi" class="form-control @error('kaprodi') is-invalid @enderror"
                                                value="{{ old('kaprodi') }}" placeholder="Masukkan Kaprodi">
                                            @error('kaprodi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
