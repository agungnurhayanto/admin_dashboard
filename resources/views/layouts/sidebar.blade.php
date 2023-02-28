<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Agung Nurhayanto</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sideba2r" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Main Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ 'kategori' }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>KATEGORI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ 'article' }}" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>

                                <p>ARTICLE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ 'pages' }}" class="nav-link">
                                <i class="nav-icon fas fa-magic"></i>
                                <p>PAGES</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ 'pengguna' }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>PENGGUNA & HAK AKSES</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ 'pengaturan' }}" class="nav-link">
                                <i class="nav-icon fas fa-marker"></i>
                                <p>PENGATURAN WEBSITE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('profil') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>PROFIL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('ganti_password') }}" class="nav-link">
                                <i class="nav-icon fas fa-lock"></i>
                                <p>GANTI PASSWORD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('#') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>KELUAR</p>
                            </a>
                        </li>
                    </ul>
                </li>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
