@extends('layouts.masteradmin')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Data Pengguna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nrp">Nrp</label>
                                <input type="text" name="nrp" class="form-control" value="{{ old('nrp', $user->nrp) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="roles">Role</label><br>
                                @foreach ($roles as $role)
                                    <label>
                                        <input type="checkbox" name="roles[]" value="{{ old('roles[]', $role->id) }}"> {{ $role->name }}
                                    </label><br>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Leave empty if no change">
                            </div>
                            

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Pengguna</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
