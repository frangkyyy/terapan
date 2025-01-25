<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assign Siswa to Mata Pelajaran</title>

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
        </nav>

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

                <!-- Sidebar Menu -->
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
                                <p class="font-weight-bold">Data Nilai Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/guru/assign-student-to-subject') }}" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p class="font-weight-bold">Assign Siswa</p>
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
                            <form id="logout-form" action="{{route('logout')}}" method="post">
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Assign Siswa to Mata Pelajaran</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('guru.assignStudentToSubject') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="user_id">Pilih Siswa</label>
                                    <select name="user_id" class="form-control" required>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="mata_pelajaran_id">Pilih Mata Pelajaran</label>
                                    <select name="mata_pelajaran_id" class="form-control" required>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id_mata_pelajaran }}">{{ $subject->nama_mata_pelajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="periode_id">Pilih Periode</label>
                                    <select name="periode_id" class="form-control" required>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->periode->id_periode }}">{{ $subject->periode->id_periode }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Assign</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>
