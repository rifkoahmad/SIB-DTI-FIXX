@extends('kerangka.master')

@section('title', 'Edit Data Barang Masuk')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Edit Data Barang Masuk</h4>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('barangmasuk.index')}}" class="btn btn-secondary ms-4">Back</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('barangmasuk.update', $barangmasuk->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="barangs_id">Nama Barang</label>
                                        <div class="position-relative">
                                            <select id="barangs_id" name="barangs_id" class="form-control @error('barangs_id') is-invalid @enderror">
                                                @foreach ($barang as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $barangmasuk->barangs_id ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
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
                                        <label for="suppliers_id">Supplier</label>
                                        <div class="position-relative">
                                            <select id="suppliers_id" name="suppliers_id" class="form-control @error('suppliers_id') is-invalid @enderror">
                                                @foreach ($supplier as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $barangmasuk->suppliers_id ? 'selected' : '' }}>{{ $item->nama_supplier }}</option>
                                                @endforeach
                                            </select>
                                            @error('suppliers_id')
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
                                        <label for="jumlah_barang">Jumlah Barang</label>
                                        <div class="position-relative">
                                            <input type="text" id="jumlah_barang" name="jumlah_barang" class="form-control @error('jumlah_barang') is-invalid @enderror" value="{{ old('jumlah_barang', $barangmasuk->jumlah_barang) }}" placeholder="Masukkan Jumlah Barang">
                                            @error('jumlah_barang')
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
                                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                        <div class="position-relative">
                                            <input class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" type="date" value="{{ old('tanggal_masuk', $barangmasuk->tanggal_masuk) }}">
                                            @error('tanggal_masuk')
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
