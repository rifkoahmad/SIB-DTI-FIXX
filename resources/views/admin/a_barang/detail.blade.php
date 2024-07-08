@extends('kerangka.master')

@section('title', 'Detail Barang')

@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Barang</h4>
                    </div>
                    <div class="d-flex justify-content-start mb-4">
                        <a href="{{ route('barang.index')}}" class="btn btn-secondary ms-0,1">Back</a>
                    </div>
                    <div class="card-content"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th width="250px">Nama Barang</th>
                                <td>: {{ $barang->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th>Kode Barang</th>
                                <td>: {{ $barang->kode_barang }}</td>
                            </tr>
                            <tr>
                                <th>Ruangan</th>
                                <td>: {{ $barang->ruangans->nama_ruangan }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>: {{ $barang->stok }}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>
                                    <a href="{{ asset('storage/image/' . $barang->foto) }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('storage/image/' . $barang->foto) }}" alt="{{ $barang->nama_barang }}" width="50%">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:
                                    @if ($barang->status == 1)
                                        <span class="badge bg-success">Bagus</span>
                                    @else
                                        <span class="badge bg-danger">Rusak</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
