@extends('kerangka.master')
@section('title', 'Tambah Data Barang')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Barang</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('barang.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nama_barang">Nama Barang</label>
                                        <div class="position-relative">
                                            <input type="text" id="nama_barang" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" placeholder="Masukkan Nama Barang">
                                            @error('nama_barang')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-box"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="kode_barang">Kode Barang</label>
                                        <div class="position-relative">
                                            <input type="text" id="kode_barang" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" value="{{ old('kode_barang') }}" placeholder="Masukkan Kode Barang">
                                            @error('kode_barang')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-upc-scan"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="ruangans_id">Ruangan</label>
                                        <div class="position-relative">
                                            <select id="ruangans_id" name="ruangans_id" class="form-control @error('ruangans_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Ruangan--</option>
                                                @foreach ($ruangan as $item)
                                                    <option value="{{ $item->id }}" {{ old('ruangans_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_ruangan }}</option>
                                                @endforeach
                                            </select>
                                            @error('ruangans_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-open"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="stok">Stok</label>
                                        <div class="position-relative">
                                            <input type="number" id="stok" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" placeholder="Masukkan Jumlah Stok">
                                            @error('stok')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-boxes"></i>
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
                                                <i class="bi bi-image"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="status" class="form-label">Status</label>
                                        <div class="position-relative">
                                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Status--</option>
                                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Bagus</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Rusak</option>
                                            </select>
                                            @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-toggle-on"></i>
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
