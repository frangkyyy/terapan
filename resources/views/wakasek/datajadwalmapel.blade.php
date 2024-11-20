@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manajemen Jadwal Mata Pelajaran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Wakasek</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        {{--        <div class="card-footer">--}}
        {{--            <div class="container-fluid">--}}
        {{--                <div class="card-body">--}}
        {{--                    <a href="#" class="btn btn-success">Pengajuan Beasiswa</a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <table id="table-pb" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <th>ID Mata Pelajaran</th>
                                        <th>Pengajar</th>
                                        <th>Kelas</th>
                                        <th>Jadwal</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mapels as $mapel)
                                        <tr>
                                            <td>{{ $mapel->nama_mata_pelajaran }}</td>
                                            <td>{{ $mapel->id_mata_pelajaran }}</td>
                                            <td>{{ $mapel->pengajar }}</td>
                                            <td>{{ $mapel->kelas }}</td>
                                            <td>{{ $mapel->jam }}</td>
                                            <td>
                                                <a href="{{ route('jadwalmapel-edit', $mapel->id_mata_pelajaran) }}" class="btn btn-primary">Edit</a>
                                                {{--                                                <form action="{{ route('mapel-destroy', $mapel->id_mata_pelajaran) }}" method="POST">--}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" data-confirm="Apakah anda yakin ingin menghapus data ini?">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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