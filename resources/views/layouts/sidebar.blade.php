<aside class="main-sidebar sidebar-dark-blue elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/smalogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SMAN 1 BANDUNG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hello Wakasek</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('list-mapel') }}" class="nav-link {{ Request::is('listmapel') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('data-mapel') }}" class="nav-link {{ Request::is('datamapel', 'tambahmapel') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Mata Pelajaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('data-jadwalmapel') }}" class="nav-link {{ Request::is('datajadwalmapel') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Data Jadwal Mapel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('data-periode') }}" class="nav-link {{ Request::is('dataperiode') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Periode
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
    <!-- /.sidebar-->
</aside>
<!-- Atau jika Anda menggunakan jQuery dari CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    console.log({{Auth::user()}});
    $(document).ready(function(){
        $('a.nav-link').click(function(){
            $('a.nav-link').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
