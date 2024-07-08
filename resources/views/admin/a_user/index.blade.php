@extends('kerangka.master')
@section('title', 'Tabel User')
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-center">Tabel User</h4>
                        <div>
                            <a class="btn btn-success" href="{{ route('user.create') }}">Tambah</a>
                            <a class="btn btn-primary" href="{{ route('user.export') }}">Export</a>
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr class="table-info">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Fungsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if (!empty($item->getRoleNames()))
                                                @foreach ($item->getRoleNames() as $rolename)
                                                    <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-primary btn-sm me-2"
                                                    href="{{ route('user.show', $item->id) }}">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                                {{-- @if ($item->peran !== 'admin')
                                                    <a class="btn btn-primary btn-sm me-2"
                                                        href="{{ route('user.edit', $item->id) }}">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                @else
                                                    <button class="btn btn-primary btn-sm me-2" disabled>
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </button>
                                                @endif --}}
                                                @if($item->name == 'Admin User')
                                                @else
                                                <a class="btn btn-primary btn-sm me-2"
                                                        href="{{ route('user.edit', $item->id) }}">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                                    class="d-inline delete-form">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="button" class="btn btn-danger btn-sm delete-button">
                                                        <i class="bi bi-trash-fill"></i> Delete
                                                    </button>
                                                </form>
                                                @endif
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
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
@endsection
