@extends('kerangka.master')
@section('title', 'Tabel Mahasiswa')
@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-center">Tabel Mahasiswa</h4>
                        <div>
                            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">Tambah</a>
                            <a class="btn btn-primary" href="{{ route('mahasiswa.export') }}">Export</a>
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
                        <form action="{{ route('mahasiswa.index') }}" method="GET" class="mb-3">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ request()->get('nama') }}">
                                </div>
                                <div class="col-md-1">
                                    <input type="text" name="nim" class="form-control" placeholder="NIM" value="{{ request()->get('nim') }}">
                                </div>
                                <div class="col-md-1">
                                    <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" value="{{ request()->get('angkatan') }}">
                                </div>
                                <div class="col-md-1">
                                    <select name="prodi" class="form-control">
                                        <option value="">All</option>
                                        @foreach ($prodis as $prodi)
                                            <option value="{{ $prodi->id }}" {{ request()->get('prodi') == $prodi->id ? 'selected' : '' }}>{{ $prodi->prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Angkatan</th>
                                    <th>IPK</th>
                                    <th>Program Studi</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nim }}</td>
                                        <td>{{ $item->angkatan }}</td>
                                        <td>{{ $item->ipk }}</td>
                                        <td>{{ $item->prodis->prodi }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-primary btn-sm me-2" href="{{ route('mahasiswa.show', $item->id) }}">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                                <a class="btn btn-primary btn-sm me-2" href="{{ route('mahasiswa.edit', $item->id) }}">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash-fill"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $mahasiswa->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
