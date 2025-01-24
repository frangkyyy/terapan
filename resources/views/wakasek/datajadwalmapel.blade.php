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

                                <!-- Tombol untuk Periode -->
                                <div class="form-group">
                                    <label for="periode-buttons">Pilih Periode:</label>
                                    <div id="periode-buttons" class="btn-group" role="group">
                                        @foreach($periodes as $periode)
                                            <button type="button"
                                                    class="btn btn-outline-primary periode-button"
                                                    data-periode="{{ $periode->id_periode }}">
                                                {{ $periode->id_periode }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Jadwal Mata Pelajaran -->
                                <div class="card">
                                    <div class="card-body">
                                    <table id="table-pb" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <th>ID Mata Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Kelas</th>
                                        <th>Jadwal</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="mapel-table-body">
                                    <div id="loading-spinner" style="display: none; text-align: center; font-weight: bold; margin: 20px 0;">
                                        Loading...
                                    </div>
                                    @foreach($mapels as $mapel)
                                        <tr data-periode="{{ $mapel->id_periode }}">
                                            <td>{{ $mapel->nama_mata_pelajaran }}</td>
                                            <td>{{ $mapel->id_mata_pelajaran }}</td>
                                            <td>{{ $mapel->pengajar }}</td>
                                            <td>{{ $mapel->kelas }}</td>
                                            <td>{{ $mapel->jam }}</td>
                                            <td>
                                                <a href="{{ route('jadwalmapel-edit', $mapel->id_mata_pelajaran) }}" class="btn btn-primary">Edit</a>
                                                {{--                                                <form action="{{ route('mapel-destroy', $mapel->id_mata_pelajaran) }}" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger btn-sm" data-confirm="Apakah anda yakin ingin menghapus data ini?">Delete</button>--}}
{{--                                                </form>--}}
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
                </div>
            </div>
            @endsection

            @section('ExtraCSS')
                <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
            @endsection

            @section('ExtraJS')
                <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
                <script>
                    $(document).ready(function () {
                        // Inisialisasi DataTables
                        $('#table-pb').DataTable();

                        // Filter data berdasarkan tombol periode
                        $('.periode-button').on('click', function () {
                            const selectedPeriode = $(this).data('periode');
                            const rows = $('#mapel-table-body tr');

                            // Toggle tombol aktif
                            $('.periode-button').removeClass('active btn-primary').addClass('btn-outline-primary');
                            $(this).addClass('active btn-primary').removeClass('btn-outline-primary');

                            // Tampilkan baris berdasarkan periode yang dipilih
                            rows.hide();
                            if (selectedPeriode) {
                                rows.each(function () {
                                    if ($(this).data('periode') === selectedPeriode) {
                                        $(this).show();
                                    }
                                });
                            }
                        });
                    });
                </script>
@endsection
