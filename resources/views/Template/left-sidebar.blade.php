<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="#" class="brand-link"> -->
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <!-- <p class="nav-links"><strong>Go-BLOG Dev</strong></p> -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">


              @if (auth()->user()->level == "karyawan")
              <!-- <div class="image">
                  <img src="/Rioadi/img/logo.png" class="img-circle elevation-2" alt="User Image">
              </div> -->
              <div class="info">
                  <a href="{{route('dashboard-karyawan')}}" class="d-block"><img src="/Rioadi/img/logo login page.png" style="height:100%;width:60%"></a>
              </div>

              @else
              <!-- <div class="image">
                  <img src="/Rioadi/img/logo.png" class="img-circle elevation-2" alt="User Image">
              </div> -->
              <div class="info">
                  <a href="{{route('dashboard-admin')}}" class="d-block"><img src="/Rioadi/img/logo login page.png" style="height:100%;width:60%"></a>
              </div>
              @endif



        </div>
      </div>

    <!-- </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/Rioadi/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">Hi, {{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if (auth()->user()->level == "karyawan")
                <li class="nav-item">
                    <a href="{{ route('dashboard-karyawan') }}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('laman-presensi') }}" class="nav-link ">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Presensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('filter-data-karyawan')}}" class="nav-link ">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            History
                        </p>
                    </a>
                  </li>
                @endif
                @if (auth()->user()->level == "admin")
                <li class="nav-item">
                    <a href="{{ route('dashboard-admin') }}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endif
                @if (auth()->user()->level == "admin")
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('filter-data')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Presensi Karyawan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
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
