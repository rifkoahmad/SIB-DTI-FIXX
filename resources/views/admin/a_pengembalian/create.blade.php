@extends('kerangka.master')
@section('title', 'Tambah Pengembalian')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Tambah Pengembalian</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('pengembalian.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="peminjamen_id">Nama Peminjam</label>
                                        <div class="position-relative">
                                            <select id="peminjamen_id" name="peminjamen_id" class="form-control @error('peminjamen_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Peminjam--</option>
                                                @foreach ($peminjaman as $item)
                                                    <option value="{{ $item->id }}" {{ old('peminjamen_id') == $item->id ? 'selected' : '' }}>{{ $item->users->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('peminjamen_id')
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
                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                        <div class="position-relative">
                                            <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" value="{{ old('tanggal_kembali') }}">
                                            @error('tanggal_kembali')
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
                                        <label for="pegawais_id">Penanggun Jawab</label>
                                        <div class="position-relative">
                                            <select id="pegawais_id" name="pegawais_id" class="form-control @error('pegawais_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih Pegawai--</option>
                                                @foreach ($pegawai as $item)
                                                    <option value="{{ $item->id }}" {{ old('pegawais_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('pegawais_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
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
