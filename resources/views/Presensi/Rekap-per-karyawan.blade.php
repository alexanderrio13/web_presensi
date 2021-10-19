<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>Go-Blog | Laporan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @include('Template.head')
<style>

</style>
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0 text-dark">History Activity</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">History</li>
                          </ol>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>

            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="row justify-content-center">
                    <div class="card card-info card-outline" style="margin-right:10px;margin-left:10px">
                        <div class="card-header">Data Presensi</div>
                        <div class="card-body">
                            <!-- <div class="form-group">
                                <label for="label">Tanggal Awal</label>
                                <input type="date" name="tglawal" id="tglawal" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="label">Tanggal Akhir</label>
                                <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                            </div>
                            <div class="form-group">
                                <a href="" onclick="this.href='/filter-data/'+ document.getElementById('tglawal').value +
                            '/' + document.getElementById('tglakhir').value " class="btn btn-primary col-md-12">
                                    Lihat <i class="fas fa-print"></i>
                                </a>
                            </div> -->
                            <div class="form-group">
                                <table class="w3-table-all" border="1" style="  table-layout: fixed;width: 100%;">
                                    <tr class="w3-hover-cyan">

                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Jumlah Jam Kerja</th>
                                        <th>Status Presensi</th>
                                    </tr>
                                    @foreach ($presensi as $p)
                                    <tr class="w3-hover-cyan">

                                        <td>{{ $p->tgl }}</td>
                                        <td>{{ $p->jammasuk ?? '-'}}</td>
                                        <td>{{ $p->jamkeluar ?? '-' }}</td>
                                        <td>{{ $p->jamkerja ?? '-' }}</td>
                                        <td>
                                          @if ($p->jammasuk > '08:30:59')
                                          <span class="badge badge-danger">Terlambat</span>
                                          @else
                                          <span class="badge badge-success">On Time</span>
                                          @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

                            </div>
                        </div><!-- /.container-fluid -->

                    </div>
            </div>
            <!-- /.row -->

            <br>
            <div class="row justify-content-center">
            <div class="card card-info card-outline" style="margin-right:10px;margin-left:10px">
                <div class="card-header">Data Lembur</div>
                <div class="card-body">
                    <div class="form-group">
                        <table class="w3-table-all" border="1" style="  table-layout: fixed;width: 100%;">
                            <tr class="w3-hover-cyan">

                                <th>Tanggal</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Jumlah Lembur</th>
                                <th>Pengerjaan</th>
                            </tr>
                            @foreach ($lembur as $l)
                            <tr class="w3-hover-cyan">

                                <td>{{ $l->tgl }}</td>
                                <td>{{ $l->lemburmasuk }}</td>
                                <td>{{ $l->lemburkeluar }}</td>
                                <td>{{ $l->lamalembur }}</td>
                                <td>{{ $l->desc_lembur }}</td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div><!-- /.container-fluid -->

            </div>
            </div>
          </div>

          </div>
          <!-- content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- <aside class="control-sidebar control-sidebar-dark"> -->
            <!-- Control sidebar content goes here -->
            <!-- <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div> -->
        <!-- </aside> -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('Template.script')
</body>
</html>
