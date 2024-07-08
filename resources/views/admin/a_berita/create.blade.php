@extends('kerangka.master')
@section('title', 'Tambah Data Berita')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Berita</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('berita.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="judul">Judul</label>
                                        <div class="position-relative">
                                            <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Masukkan Judul">
                                            @error('judul')
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
                                        <label for="kategori_berita_id">Kategori</label>
                                        <div class="position-relative">
                                            <select id="kategori_berita_id" name="kategori_beritas_id" class="form-control @error('kategori_beritas_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Kategori--</option>
                                                @foreach ($kategori_berita as $item)
                                                    <option value="{{ $item->id }}" {{ old('kategori_beritas_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_beritas_id')
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
                                        <label for="catatan">Deskripsi</label>
                                        <div class="position-relative">
                                            <textarea id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror" placeholder="Masukkan Deskripsi">{{ old('catatan') }}</textarea>
                                            @error('catatan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-card-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <div class="position-relative">
                                            <input class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" type="file">
                                            @error('gambar')
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
                                        <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi</label>
                                        <div class="position-relative">
                                            <input class="form-control @error('tanggal_publikasi') is-invalid @enderror" id="tanggal_publikasi" name="tanggal_publikasi" type="date" value="{{ old('tanggal_publikasi') }}">
                                            @error('tanggal_publikasi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
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
