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
                        <form action="{{ route('wakasek.mapel-store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kelas_dropdown">Pilih Kelas</label>
                                <select name="kelas" id="kelas_dropdown" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    <option value="10">Kelas 10</option>
                                    <option value="11">Kelas 11</option>
                                    <option value="12">Kelas 12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mapel">Nama Mata Pelajaran</label>
                                <input type="text" name="nama_mata_pelajaran" id="mapel" class="form-control"
                                       placeholder="Nama Mata Pelajaran" required>
                                <small id="mapel-error" class="form-text text-danger d-none">
                                    Mata pelajaran yang diinput sudah ada!
                                </small>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label>ID Mata Pelajaran (Generated)</label>--}}
{{--                                <input id="idmapel" class="form-control" rows="3" readonly></input>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="id_periode">Pilih Periode</label>
                                <select name="id_periode" id="id_periode" class="form-control" required>
                                    <option value="" disabled selected>Pilih Periode</option>
                                    @foreach($periodes as $periode)
                                        <option value="{{ $periode->id_periode }}">{{ $periode->id_periode }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pengajar">Pengajar</label>
                                <input type="text" name="pengajar" class="form-control" placeholder="Pengajar" required>
                            </div>
                            <div class="form-group">
                                <label for="jam">Jadwal</label>
                                <input type="text" name="jam" id="jam" class="form-control"
                                       placeholder="Contoh: Selasa(10:00-11:30) & Rabu(12:00-13:00)" required>
                                <small class="form-text text-danger d-none" id="jam-error">
                                    Jadwal yang diinput sudah ada!
                                </small>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="kelas">Kelas</label>--}}
{{--                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn btn-primary" id="submit-button" disabled>Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('ExtraJS')
        <script>
            const jamInput = document.getElementById('jam');
            const jamError = document.getElementById('jam-error');
            const mapelInput = document.getElementById('mapel');
            const mapelError = document.getElementById('mapel-error');
            const submitButton = document.getElementById('submit-button');

            submitButton.disabled = false; // Default aktifkan tombol submit

            jamInput.addEventListener('input', function () {
                const jamValue = jamInput.value.trim();
                if (jamValue.length > 0) {
                    fetch(`/check-jam?jam=${encodeURIComponent(jamValue)}`)
                        .then(response => response.json())
                        .then(data => {
                            jamError.classList.toggle('d-none', !data.exists);
                            submitButton.disabled = data.exists;
                        })
                        .catch(() => {
                            console.error('Error: Tidak dapat memvalidasi jadwal.');
                            jamError.classList.add('d-none');
                            submitButton.disabled = false;
                        });
                } else {
                    jamError.classList.add('d-none');
                    submitButton.disabled = false;
                }
            });


            mapelInput.addEventListener('input', function () {
                const mapelName = mapelInput.value.trim();

                if (mapelName.length > 0) {
                    fetch(`/check-mapel?name=${encodeURIComponent(mapelName)}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.exists) {
                                mapelError.classList.remove('d-none'); // Tampilkan pesan error
                                submitButton.disabled = true; // Nonaktifkan tombol submit
                            } else {
                                mapelError.classList.add('d-none'); // Sembunyikan pesan error
                                submitButton.disabled = false; // Aktifkan tombol submit
                            }
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    mapelError.classList.add('d-none'); // Sembunyikan pesan error jika input kosong
                    submitButton.disabled = true; // Nonaktifkan tombol submit jika input kosong
                }
            });
        </script>
    @endsection
@endsection