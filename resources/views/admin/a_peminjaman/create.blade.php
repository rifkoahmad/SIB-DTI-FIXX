@extends('kerangka.master')
@section('title', 'Tambah Data Peminjaman')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Peminjaman</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('peminjaman.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="users_id">Nama User</label>
                                        <div class="position-relative">
                                            <select id="users_id" name="users_id" class="form-control @error('users_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Akun Anda--</option>
                                                @foreach ($user as $item)
                                                    <option value="{{ $item->id }}" {{ old('users_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="barangs_id">Barang</label>
                                        <div class="position-relative">
                                            <select id="barangs_id" name="barangs_id" class="form-control @error('barangs_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Barang--</option>
                                                @foreach ($barang as $item)
                                                    <option value="{{ $item->id }}" {{ old('barangs_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                            @error('barangs_id')
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
                                        <label for="jumlah">Jumlah</label>
                                        <div class="position-relative">
                                            <input type="number" id="jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" placeholder="Masukkan Jumlah">
                                            @error('jumlah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                        <div class="position-relative">
                                            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam') }}">
                                            @error('tanggal_pinjam')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="lama_pinjam">Lama Pinjam</label>
                                        <div class="position-relative">
                                            <input type="text" id="lama_pinjam" name="lama_pinjam" class="form-control @error('lama_pinjam') is-invalid @enderror" value="{{ old('lama_pinjam') }}" placeholder="Masukkan Lama Pinjam">
                                            @error('lama_pinjam')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-clock-history"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="pegawais_id">Penanggungg Jawab</label>
                                        <div class="position-relative">
                                            <select id="pegawais_id" name="pegawais_id" class="form-control @error('pegawais_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Penanggung Jawab--</option>
                                                @foreach ($pegawai as $item)
                                                    <option value="{{ $item->id }}" {{ old('pegawais_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('pegawais_id')
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
