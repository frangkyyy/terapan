@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Mata Pelajaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Jadwal Mata Pelajaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('jadwalmapel-update', $mapel->id_mata_pelajaran) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="nama_mata_pelajaran">Mata Pelajaran</label>--}}
                            {{--                                <input type="text" name="nama_mata_pelajaran" class="form-control" value="{{ $mapel->nama_mata_pelajaran }}" required>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="id_periode">ID Periode</label>--}}
                            {{--                                <input type="text" name="id_periode" class="form-control" value="{{ $mapel->id_periode }}" required>--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="jam">Jadwal</label>
                                <input type="text" name="jam" class="form-control" value="{{ $mapel->jam }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
