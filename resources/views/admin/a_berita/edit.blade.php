@extends('kerangka.master')

@section('title', 'Edit Data Berita')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Data Berita</h4>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('berita.index')}}" class="btn btn-secondary ms-4">Back</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('berita.update', $berita->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="oldImg" value="{{ $berita->gambar }}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="judul">Judul</label>
                                        <div class="position-relative">
                                            <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}" placeholder="Masukkan Judul">
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
                                            <select id="kategori_berita_id" name="kategori_berita_id" class="form-control @error('kategori_berita_id') is-invalid @enderror">
                                                @foreach ($kategori_berita as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $berita->kategori_beritas_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_berita_id')
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
                                            <textarea id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror" placeholder="Masukkan Deskripsi">{{ old('catatan', $berita->catatan) }}</textarea>
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
                                            <div class="mt-1">
                                                <small>Gambar Lama</small><br>
                                                <img src="{{ asset('storage/image/' . $berita->gambar) }}" alt="" width="200px">
                                            </div>
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
                                            <input class="form-control @error('tanggal_publikasi') is-invalid @enderror" id="tanggal_publikasi" name="tanggal_publikasi" type="date" value="{{ old('tanggal_publikasi', $berita->tanggal_publikasi) }}">
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
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
