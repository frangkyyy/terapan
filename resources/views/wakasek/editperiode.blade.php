@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Periode</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Periode</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('wakasek.periode-edit', $periode->id_periode) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_periode">ID Periode</label>
                                <input type="text" name="id_periode" class="form-control" value="{{ $periode->id_periode }}" required>
                            </div>
                                <div class="form-group">
                                <label for="tahun_akademik">Tahun Akademik</label>
                                <input type="text" name="tahun_akademik" class="form-control" value="{{ $periode->tahun_akademik }}" required>
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="text" name="semester" class="form-control" value="{{ $periode->semester }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection