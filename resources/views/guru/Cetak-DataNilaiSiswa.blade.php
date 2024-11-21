<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA NILAI SISWA</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Nilai Siswa</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nilai</th>
            </tr>
        @foreach ($dtCetakDataNilaiSiswa as $item )
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->nama}}</td>
            <td>{{ $item->kelas}}</td>
            <td>{{ $item->nilai}}</td>
        </tr>
        @endforeach
           
        </table>
    </div>
    
</body>
</html>