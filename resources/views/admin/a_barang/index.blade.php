@extends('kerangka.master')
@section('title', 'Tabel Barang')
@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-center">Tabel Barang</h4>
                        <div>
                            @hasrole('admin')
                                <a class="btn btn-success" href="{{ route('barang.create') }}">Tambah</a>
                                <a class="btn btn-primary" href="{{ route('barang.export') }}">Export</a>
                            @endhasrole
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session()->has('failed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-content">
                        <form method="GET" action="{{ route('barang.index') }}" class="mb-3">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-1">
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="Filter by Nama Barang" value="{{ request()->nama_barang }}">
                                </div>
                                <div class="col-md-1">
                                    <input type="text" name="kode_barang" class="form-control"
                                        placeholder="Filter by Kode Barang" value="{{ request()->kode_barang }}">
                                </div>
                                <div class="col-md-1">
                                    <select name="status" class="form-control">
                                        <option value="">All</option>
                                        <option value="0" {{ request()->status == '0' ? 'selected' : '' }}>Rusak
                                        </option>
                                        <option value="1" {{ request()->status == '1' ? 'selected' : '' }}>Bagus
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-content">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Ruangan</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->kode_barang }}</td>
                                        <td>{{ $item->ruangans->nama_ruangan }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>
                                            <span class="badge {{ $item->status == 0 ? 'bg-danger' : 'bg-success' }}">
                                                {{ $item->status == 0 ? 'Rusak' : 'Bagus' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-primary btn-sm me-2"
                                                    href="{{ route('barang.show', $item->id) }}">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                                <a class="btn btn-primary btn-sm me-2"
                                                    href="{{ route('barang.edit', $item->id) }}">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Anda yakin ingin menghapus data barang ini?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash-fill"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
