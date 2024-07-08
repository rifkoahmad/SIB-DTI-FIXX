@extends('kerangka.master')
@section('title', 'Edit Barang Keluar')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Barang Keluar</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('barangkeluar.update', $barangkeluar->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="peminjamen_id">Akun</label>
                                        <div class="position-relative">
                                            <select id="peminjamen_id" name="peminjamen_id" class="form-control @error('peminjamen_id') is-invalid @enderror">
                                                @foreach ($peminjaman as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $barangkeluar->peminjamen_id ? 'selected' : '' }}>{{ $item->users->name }}</option>
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
                                            <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" value="{{ old('tanggal_keluar', $barangkeluar->tanggal_keluar) }}">
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
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    <a href="{{ route('barangkeluar.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
