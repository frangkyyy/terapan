@extends('layouts.masteradmin')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List {{ $role }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h2>Daftar {{ $role }}</h2>
                                <a href="/datauser-add-{{ strtolower($role) }}" class="btn btn-success btn-sm ml-auto">Tambah 
                                    {{ $role }} Baru</a>
                            </div>

                            {{-- Flash message for success or failure --}}
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if(Session::has('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <form action="{{ route('users.search', ['role' => strtolower($role)]) }}" 
                                    method="GET" class="d-flex mt-3">
                                    <input type="text" name="query" class="form-control w-50 ml-3" 
                                        placeholder="Search here">
                                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                                    <a href="{{ route('user', ['role' => strtolower($role)]) }}" class="btn btn-secondary ml-3 ">
                                        Reset
                                    </a>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="table-pb" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Tgl Lahir</th>
                                        <th>No HP</th>
                                        <th>Tanggal Ditambah</th>
                                        <th>Tanggal Diupdate</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($all_users) && count($all_users) > 0)
                                            @foreach ($all_users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->alamat }}</td>
                                                    <td>{{ $user->tgl_lahir }}</td>
                                                    <td>{{ $user->no_hp }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>{{ $user->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ route('edit-user', ['id' => $user->id, 'role' => strtolower($role)])   }}" class="btn btn-primary">Edit</a>
                                                        <form action="{{ route('user.delete', ['id' => $user->id, 'role' => strtolower($role)]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-confirm="Apakah anda yakin ingin menghapus data ini?">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="12">Data tidak ditemukan !</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            @endsection

            @section('ExtraCSS')
                <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
            @endsection

            @section('ExtraJS')
                <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
                <script>
                    $('#table-pb').DataTable();
                </script>
@endsection
