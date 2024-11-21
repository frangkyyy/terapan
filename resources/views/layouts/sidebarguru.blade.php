<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{ url('/Dashboard') }}"class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p class="font-weight-bold">
          Dashboard
        </p>
      </a>
    
    </li>
    <li class="nav-item">
      <a href="{{ url('/MataPelajaran') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Mata Pelajaran
        </p>
      </a>
    </li>
    <li class="nav-item">
    <a href="{{ url('/DataNilaiSiswa') }}" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Data Siswa
        </p>
      </a>
     
  </ul>
</nav>