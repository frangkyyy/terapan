@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Mata Pelajaran</h1>
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
                        <form action="{{ route('mapel-store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="idmapel">ID Mata Pelajaran</label>
                                <input type="text" name="id_mata_pelajaran" class="form-control" placeholder="ID Mata Pelajaran" required>
                            </div>
                            <div class="form-group">
                                <label for="mapel">Nama Mata Pelajaran</label>
                                <input type="text" name="nama_mata_pelajaran" class="form-control" placeholder="Nama Mata Pelajaran" required>
                            </div>
                            <div class="form-group">
                                <label for="idperiode">ID Periode</label>
                                <input type="text" name="id_periode" class="form-control" value="GNP2425" readonly>
                            </div>
                            <div class="form-group">
                                <label for="pengajar">Pengajar</label>
                                <input type="text" name="pengajar" class="form-control" placeholder="Pengajar" required>
                            </div>
                            <div class="form-group">
                                <label for="jam">Jadwal</label>
                                <input type="text" name="jam" class="form-control" placeholder="Jadwal" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
