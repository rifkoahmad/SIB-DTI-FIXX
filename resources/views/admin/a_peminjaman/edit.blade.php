@extends('kerangka.master')

@section('title', 'Edit Data Peminjaman')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Data Peminjaman</h4>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('peminjaman.index')}}" class="btn btn-secondary ms-4">Back</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="users_id">Akun</label>
                                        <div class="position-relative">
                                            <select id="users_id" name="users_id" class="form-control @error('users_id') is-invalid @enderror">
                                                @foreach ($user as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $peminjaman->users_id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                                @foreach ($barang as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $peminjaman->barangs_id ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
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
                                            <input type="number" id="jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $peminjaman->jumlah) }}" placeholder="Masukkan Jumlah">
                                            @error('jumlah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-calculator"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                        <div class="position-relative">
                                            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}">
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
                                        <label for="lama_pinjam">Lama Pinjam (hari)</label>
                                        <div class="position-relative">
                                            <input type="text" id="lama_pinjam" name="lama_pinjam" class="form-control @error('lama_pinjam') is-invalid @enderror" value="{{ old('lama_pinjam', $peminjaman->lama_pinjam) }}" placeholder="Masukkan Lama Pinjam">
                                            @error('lama_pinjam')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-clock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="pegawais_id">Penanggung Jawab</label>
                                        <div class="position-relative">
                                            <select id="pegawais_id" name="pegawais_id" class="form-control @error('pegawais_id') is-invalid @enderror">
                                                @foreach ($pegawai as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $peminjaman->pegawais_id ? 'selected' : '' }}>{{ $item->nama }}</option>
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
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
