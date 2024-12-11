@extends('admin.layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit {{ $role }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit {{ $role }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('mapel-update', $mapel->id_mata_pelajaran) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
{{--                            <div class="form-group">--}}
{{--                                <label for="nama_mata_pelajaran">{{ $role }}</label>--}}
{{--                                <input type="text" name="nama_mata_pelajaran" class="form-control" value="{{ $mapel->nama_mata_pelajaran }}" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="id_periode">Nama</label>--}}
{{--                                <input type="text" name="id_periode" class="form-control" value="{{ $mapel->id_periode }}" required>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="pengajar">Alamat</label>
                                <input type="text" name="pengajar" class="form-control" value="{{ $mapel->pengajar }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Tgl Lahir</label>
                                <input type="text" name="kelas" class="form-control" value="{{ $mapel->kelas }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">No HP</label>
                                <input type="text" name="kelas" class="form-control" value="{{ $mapel->kelas }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
