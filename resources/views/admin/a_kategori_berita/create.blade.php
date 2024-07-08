@extends('kerangka.master')
@section('title', 'Tambah Data Kategori Berita')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Tambah Data Kategori Berita</h4>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('kategoriberita.index')}}" class="btn btn-secondary ms-4">Back</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                        action="{{ route('kategoriberita.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nama">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama')}}" placeholder="Masukkan Nama">
                                            @error('nama')
                                                <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-file-text"></i>
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
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
