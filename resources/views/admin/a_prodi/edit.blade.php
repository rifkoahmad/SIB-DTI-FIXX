@extends('kerangka.master')
@section('title', 'Edit Data Prodi')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Data Prodi</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('prodi.update', $prodi->id) }}">
                        @csrf
                        @method('patch')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="prodi">Prodi</label>
                                        <div class="position-relative">
                                            <input type="text" id="prodi" name="prodi"
                                                class="form-control @error('prodi') is-invalid @enderror"
                                                value="{{ old('prodi') ?? $prodi->prodi }}" placeholder="Masukkan Prodi">
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
                                            <input type="text" id="kaprodi" name="kaprodi"
                                                class="form-control @error('kaprodi') is-invalid @enderror"
                                                value="{{ old('kaprodi') ?? $prodi->kaprodi }}" placeholder="Masukkan Kaprodi">
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
                            <a href="{{ route('prodi.index')}}" class="btn btn-secondary me-1 mb-1">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
