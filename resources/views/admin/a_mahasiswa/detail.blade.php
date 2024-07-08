@extends('kerangka.master')

@section('title', 'Detail Mahasiswa')

@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Mahasiswa</h4>
                    </div>
                    <div class="d-flex justify-content-start mb-4">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary ms-0.1">Back</a>
                    </div>
                    <div class="card-content"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th width="250px">Nama</th>
                                <td>: {{ $mahasiswa->nama }}</td>
                            </tr>
                            <tr>
                                <th>Nama Akun</th>
                                <td>: {{ $mahasiswa->users->name }}</td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td>: {{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>: {{ $mahasiswa->prodis->prodi }}</td>
                            </tr>
                            <tr>
                                <th>Angkatan</th>
                                <td>: {{ $mahasiswa->angkatan }}</td>
                            </tr>
                            <tr>
                                <th>IPK</th>
                                <td>: {{ $mahasiswa->ipk }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
