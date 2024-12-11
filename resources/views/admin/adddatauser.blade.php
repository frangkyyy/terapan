@extends('layouts.masteradmin')

@section('web-content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Mata Pelajaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('AddUser', ['role' => $role]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="role" value="{{ $role }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="" id="">
                                    <option value="{{ $role }}" disabled selected>Select role</option>
                                    <option value="admin" {{ $role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="guru" {{ $role == 'guru' ? 'selected' : '' }}>Guru</option>
                                    <option value="wakasek" {{ $role == 'wakasek' ? 'selected' : '' }}>Wakasek</option>
                                    <option value="siswa" {{ $role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control" placeholder="Enter email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" 
                                        value="{{ old('password') }}" placeholder="Enter password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" 
                                        value="{{ old('password_confirmation') }}" placeholder="Confirm password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> 
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tgl Lahir" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="No HP" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection