@extends('layouts.masteradmin')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Pengguna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="nrp">Nrp</label>
                                <input type="text" name="nrp" class="form-control" placeholder="Nrp Pengguna" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Pengguna" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Pengguna" required>
                            </div>

                            <div class="form-group">
                                <label for="roles">Role</label><br>
                                @foreach ($roles as $role)
                                    <label>
                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"> {{ $role->name }}
                                    </label><br>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
