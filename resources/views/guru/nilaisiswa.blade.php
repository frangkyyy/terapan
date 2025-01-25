<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Nilai Siswa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto"></ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/smalogo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">SMAN 1 BANDUNG</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block font-weight-bold">Alexander Pierce</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/guru/Dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/guru/scores') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p class="font-weight-bold">
                Data Nilai Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/guru/assign-student-to-subject') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p class="font-weight-bold">
                Assign Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/guru/assignments') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p class="font-weight-bold">
                Assignment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="post">
                @csrf
            </form>
            <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Nilai Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Nilai Siswa</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="card mb-4">
          <div class="card-body">
            <form method="GET" action="{{ route('guru.scores.index') }}">
              <div class="row">
                <div class="col-md-4">
                  <label for="periode_id">Pilih Periode</label>
                  <select name="periode_id" id="periode_id" class="form-control">
                    <option value="" selected>Pilih Periode</option>
                    @foreach($periodes as $periode)
                      <option value="{{ $periode->id_periode }}" {{ request('periode_id') == $periode->id_periode ? 'selected' : '' }}>
                        {{ $periode->id_periode }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="mata_pelajaran_id">Pilih Mata Pelajaran</label>
                  <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control">
                    <option value="" selected>Pilih Mata Pelajaran</option>
                    @foreach($mataPelajaran as $mapel)
                      <option value="{{ $mapel->id_mata_pelajaran }}" {{ request('mata_pelajaran_id') == $mapel->id_mata_pelajaran ? 'selected' : '' }}>
                        {{ $mapel->nama_mata_pelajaran }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card p-4">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Siswa</th>
                  <th>Mata Pelajaran</th>
                  <th>Periode</th>
                  <th>Nilai</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($scores as $index => $score)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $score->user->name }}</td>
                    <td>{{ $score->mataPelajaran->nama_mata_pelajaran }}</td>
                    <td>{{ $score->periode->id_periode }}</td>
                    <td>{{ $score->score }}</td>
                    <td>
                      <a href="{{ route('guru.scores.edit', $score->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('guru.scores.destroy', $score->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                  </tr>
                @endforelse
              </tbody>
            </table>

            <div class="d-flex justify-content-end">
              {{ $scores->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
