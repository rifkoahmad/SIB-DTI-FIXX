@extends('kerangka.master')

@section('title', 'Detail Berita')

@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Berita</h4>
                    </div>
                    <div class="d-flex justify-content-start mb-4">
                        <a href="{{ route('berita.index')}}" class="btn btn-secondary ms-0,1">Back</a>
                    </div>
                    <div class="card-content"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th width="250px">Judul</th>
                                <td>: {{ $berita->judul }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>: {{ $berita->kategori_beritas->nama }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>: {{ $berita->catatan }}</td>
                            </tr>
                            <tr>
                                <th>Gambar</th>
                                <td>
                                <a href="{{ asset('storage/image/' . $berita->gambar) }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('storage/image/' . $berita->gambar) }}" alt="" width="50%"></a>
                            </td>
                            </tr>
                            <tr>
                                <th>Publish Date</th>
                                <td>: {{ $berita->tanggal_publikasi }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
