@extends('kerangka.master')
@section('title', 'Edit Data Supplier')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Data Supplier</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                        action="{{ route('supplier.update', $supplier->id) }}">
                        @csrf
                        @method('patch')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nama_supplier">Nama Supplier</label>
                                        <div class="position-relative">
                                            <input type="text" id="nama_supplier" name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror"
                                                value="{{ old('nama_supplier',$supplier->nama_supplier)}}" placeholder="Masukkan Nama Supplier">
                                            @error('nama_supplier')
                                                <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-file-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="telepon_supplier">Telepon Supplier</label>
                                        <div class="position-relative">
                                            <input type="text" id="telepon_supplier" name="telepon_supplier" class="form-control @error('telepon_supplier') is-invalid @enderror"
                                                value="{{ old('telepon_supplier',$supplier->telepon_supplier)}}" placeholder="Masukkan Telepon Supplier">
                                            @error('telepon_supplier')
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
                            <a href="{{ route('kategoriberita.index')}}" class="btn btn-secondary me-1 mb-1">Back</a>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
