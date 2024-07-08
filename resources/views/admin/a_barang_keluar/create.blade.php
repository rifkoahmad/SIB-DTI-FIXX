@extends('kerangka.master')
@section('title', 'Tambah Barang Keluar')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Tambah Barang Keluar</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('barangkeluar.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="peminjamen_id">Nama User</label>
                                        <div class="position-relative">
                                            <select id="peminjamen_id" name="peminjamen_id" class="form-control @error('peminjamen_id') is-invalid @enderror">
                                                <option value="" hidden>--Pilih User--</option>
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
                                        <label for="tanggal_keluar">Tanggal Keluar</label>
                                        <div class="position-relative">
                                            <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" value="{{ old('tanggal_keluar') }}">
                                            @error('tanggal_keluar')
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
