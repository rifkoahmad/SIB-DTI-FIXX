@extends('kerangka.master')
@section('title', 'Tabel Berita')
@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-center">Tabel Berita</h4>
                        <a class="btn btn-success" href="{{ route('berita.create')}}">Tambah</a>
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
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori Berita</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Publish</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($berita as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->kategori_beritas->nama }}</td>
                                        <td>{{ $item->catatan }}</td>
                                        <td>{{ $item->gambar }}</td>
                                        <td>{{ $item->tanggal_publikasi }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-primary btn-sm me-2" href="{{ route('berita.show', $item->id) }}">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                                <a class="btn btn-primary btn-sm me-2" href="{{ route('berita.edit', $item->id) }}">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
