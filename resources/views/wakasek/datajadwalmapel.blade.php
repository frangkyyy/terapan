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

                                <!-- Dropdown untuk Periode -->
                                <div class="form-group">
                                    <label for="periode-select">Pilih Periode:</label>
                                    <select id="periode-select" class="form-control">
                                        @foreach($periodes as $periode)
                                            <option value="{{ $periode->id_periode }}">
                                                {{ $periode->id_periode }}
                                            </option>
                                        @endforeach
                                    </select>
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

                        // Filter data berdasarkan pilihan periode
                        $('#periode-select').on('change', function () {
                            const selectedPeriode = $(this).val();
                            const spinner = $('#loading-spinner');
                            const rows = $('#mapel-table-body tr');

                            // Tampilkan spinner
                            spinner.show();
                            rows.hide();

                            // Simulasi loading
                            setTimeout(function () {
                                // Sembunyikan spinner
                                spinner.hide();

                                // Filter dan tampilkan baris berdasarkan periode
                                if (selectedPeriode === '') {
                                    rows.show(); // Tampilkan semua jika tidak ada filter
                                } else {
                                    rows.each(function () {
                                        if ($(this).data('periode') === selectedPeriode) {
                                            $(this).show();
                                        }
                                    });
                                }
                            }, 500); // Waktu loading 500ms
                        });
                    });
                </script>
@endsection
