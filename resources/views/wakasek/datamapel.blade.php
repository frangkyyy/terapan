@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manajemen Mata Pelajaran</h1>
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

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
{{--                        <h5 class="m-0">List Data Mata Pelajaran</h5>--}}
                        <div>
                            <label for="filter-kelas">Pilih Kelas:</label>
                            <select id="filter-kelas" class="form-control">
                                <option value="all">Semua Kelas</option>
                                <option value="10">Kelas 10</option>
                                <option value="11">Kelas 11</option>
                                <option value="12">Kelas 12</option>
                            </select>
                        </div>
                        <a href="{{ route('wakasek.mapel-tambah') }}" class="btn btn-success">
                            Tambah Data Mata Pelajaran
                        </a>
                    </div>
                    <div class="card-body">
                        <div id="loading-text" style="display: none; text-align: center; font-weight: bold; margin: 20px 0;">
                            Loading...
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table id="table-pb" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID Mata Pelajaran</th>
                                        <th>Mata Pelajaran</th>
                                        <th>ID Periode</th>
                                        <th>Koordinator</th>
{{--                                        <th>Kelas</th>--}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mapels as $mapel)
                                        <tr class="kelas-row"
                                            data-kelas="{{ substr($mapel->id_periode, 0, 2) }}">
                                            <td>{{ $mapel->id_mata_pelajaran }}</td>
                                            <td>{{ $mapel->nama_mata_pelajaran }}</td>
                                            <td>{{ $mapel->id_periode }}</td>
                                            <td>{{ $mapel->pengajar }}</td>
{{--                                            <td>{{ $mapel->kelas }}</td>--}}
                                            <td>
                                                <a href="{{ route('wakasek.mapel-edit', $mapel->id_mata_pelajaran) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('wakasek.mapel-delete', $mapel->id_mata_pelajaran) }}" method="POST">
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

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @section('ExtraCSS')
                <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
            @endsection

            @section('ExtraJS')
                <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
                <script>
                    $(document).ready(function () {
                        const table = $('#table-pb').DataTable();

                        $('#filter-kelas').on('change', function () {
                            const selectedClass = $(this).val();

                            const loadingText = $('#loading-text');
                            loadingText.show();
                            $('#table-pb tbody').hide();

                            setTimeout(() => {
                                // Filter rows
                                if (selectedClass === 'all') {
                                    $('.kelas-row').show();
                                } else {
                                    $('.kelas-row').hide();
                                    $(`.kelas-row[data-kelas="${selectedClass}"]`).show();
                                }
                                loadingText.hide();
                                $('#table-pb tbody').show();
                            }, 500); // Simulate loading time
                        });
                    });
                </script>
@endsection