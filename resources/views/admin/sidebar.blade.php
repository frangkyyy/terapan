<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin/dashboard') }}" class="nav-link {{ Request::is('listmapel') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('data-mapel') }}" class="nav-link {{ Request::is('datamapel') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>Data Mata Pelajaran</p>
            </a>
        </li>
        <!-- Add more menu items here -->
    </ul>
</nav>
