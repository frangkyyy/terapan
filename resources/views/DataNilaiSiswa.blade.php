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
  <style>
     .nav-link.active {
    background-color: #136ab7 !important /* Ganti #warnaBaru dengan kode warna yang Anda inginkan */
  }
  .main-sidebar {
    background-color: #094375; /* Ganti dengan warna yang Anda inginkan */
  }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/img/sma_logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">SMAN 1 BANDUNG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block font-weight-bold">Alexander Pierce</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/guru/Dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          
          </li>
          <li class="nav-item">
            <a href="{{ url('/guru/MataPelajaran') }}"class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Mata Pelajaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/guru/DataNilaiSiswa') }}" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p class="font-weight-bold">
                Data Nilai Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <form id="logout-form" action="{{route('logout')}}" method="post">
                @csrf
            </form>
            <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Nilai Mata Pelajaran Matematika</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
      <div class="card card-info card-outline">
        <div class="card-header">
          <div class="card-tools">
            <a href="{{route('guru.create-datanilaisiswa')}}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
            <a href="{{route('guru.cetak-datanilaisiswa')}}" target="_blank" class="btn btn-primary">Cetak Data <i class="fas fa-print"></i></a>

          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
            @foreach ($dtDataNilaiSiswa as $item)
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>{{ $item -> nama }}</td>
              <td>{{ $item -> kelas }}</td>
              <td>{{ $item -> nilai }}</td>
              <td>
                  <a href="{{ url('/guru/edit-datanilaisiswa/'.$item->id) }}" class="fas fa-edit"></a>
                  | 
                  <a href="{{ url('/guru/delete-datanilaisiswa/'.$item->id) }}" class="fas fa-trash-alt" style="color:red"></a>
              </td>
            @endforeach
           </tr>
          </table>
        </div>
    
      </div>
    </div>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>