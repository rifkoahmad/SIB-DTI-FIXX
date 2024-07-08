@extends('kerangka.master')

@section('title', 'Detail User')

@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail User</h4>
                    </div>
                    <div class="d-flex justify-content-start mb-4">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary ms-0,1">Back</a>
                    </div>
                    <div class="card-content"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th width="250px">Nama Akun</th>
                                <td>: {{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Peran</th>
                                <td>:
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                            <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>: {{ $user->password }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>: {{ $user->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
