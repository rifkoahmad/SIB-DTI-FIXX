@extends('kerangka.master')

@section('title', 'Detail Pegawai')

@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Pegawai</h4>
                    </div>
                    <div class="d-flex justify-content-start mb-4">
                        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary ms-0.1">Back</a>
                    </div>
                    <div class="card-content"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th width="250px">Nama</th>
                                <td>: {{ $pegawai->nama }}</td>
                            </tr>
                            <tr>
                                <th>NIP/NIK</th>
                                <td>: {{ $pegawai->nip_nik }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan Akademik</th>
                                <td>: {{ $pegawai->jabatan_akademik }}</td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td>: {{ $pegawai->no_telepon }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $pegawai->email }}</td>
                            </tr>
                            <tr>
                                <th>Akun</th>
                                <td>: {{ $pegawai->users->name }}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>
                                    <a href="{{ asset('storage/image/' . $pegawai->foto) }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('storage/image/' . $pegawai->foto) }}" alt="" width="50%">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
