<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Go-Blog | History</title>
    <!-- js buat sidebar -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- data tables pagination -->
    <link rel="Stylesheet" src="https://code.jquery.com/jquery-1.12.3.js">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- chart src -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <!-- sortable: Import js dari C:\xampp\htdocs\absensi\public\AdminLte\dist\js -->
    <script src="{{ asset('AdminLte/dist/js/sort-table.js') }}"></script>



    @include('Template.head')

    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  table-layout:fixed;
  border:0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

.table tbody tr:hover td, .table tbody tr:hover th {
background-color: #eeeeea;
}

tr:nth-child(even){
  background-color: #f2f2f2
}

.input-icons i {
       position: absolute;
   }

   .input-icons {
       width: 100%;
       margin-bottom: 10px;
   }

   .icon {
       padding: 10px;
       min-width: 40px;
   }

   .input-field {
       width: 100%;
       padding: 10px;
       text-align: left;
   }

 .table tbody tr:hover td, .table tbody tr:hover th {
 background-color: #eeeeea;
 }

 table-container {
   overflow: auto;
 }

 .custom-width{
   width:100%;
 }
 @media screen and (max-width: 1024px) {
   .custom-width{
     width:150%;
   }
 }


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
              <div style="overflow-x:auto;" class="content able-responsive custom-table-responsive">
                <div class="custom-width row justify-content-center">
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
                            <div class="form-group" >
                                <table id="MyTable" class="table table-bordered custom-table js-sort-table" cellspacing="0">
                                  <thead>
                                    <tr style="background:#bab8b8">

                                        <th class="js-sort-string">Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Jumlah Jam Kerja</th>
                                        <th>Status Presensi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($presensi as $item)
                                    <tr>
                                        <td>{{ $item->tgl }}</td>
                                        <td>
                                          @if ($item->jammasuk > '08:30:59')
                                          <span class="badge badge-danger">Terlambat</span>
                                          @else
                                          <span class="badge badge-success">On Time</span>
                                          @endif
                                          <br>
                                          {{ $item->jammasuk }}
                                        </td>
                                        <td>@if ($item->jamkeluar)
                                          {{ $item->jamkeluar}}
                                          @else
                                          <span class="badge badge-warning">No data</span>
                                          @endif
                                        </td>
                                        <td>@if ($item->jamkerja)
                                          {{ $item->jamkerja}}
                                          @else
                                          <span class="badge badge-warning">No data</span>
                                          @endif
                                        </td>
                                        <td>
                                          @if ($item->jammasuk < '08:30:59' && $item->jamkeluar > '17:30:00')
                                          <span class="badge badge-success">Memenuhi</span>
                                          @else
                                          <span class="badge badge-warning">Tidak Memenuhi</span>
                                          @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                            </div>
                        </div><!-- /.container-fluid -->

                    </div>
            </div>
            <!-- /.row -->

            <br>
            <div class="custom-width row justify-content-center">
            <div class="card card-info card-outline" style="margin-right:10px;margin-left:10px">
                <div class="card-header">Data Lembur</div>
                <div class="card-body">
                    <div class="form-group">
                      <table id="MyTable2" class="table table-bordered custom-table js-sort-table" cellspacing="0">
                        <thead>
                          <tr style="background:#bab8b8">

                                <th class="js-sort-string">Tanggal</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Jumlah Lembur</th>
                                <th>Pengerjaan</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($lembur as $l)
                            <tr>

                                <td>{{ $l->tgl }}</td>
                                <td>{{ $l->lemburmasuk }}</td>
                                <td>{{ $l->lemburkeluar }}</td>
                                <td>{{ $l->lamalembur }}</td>
                                <td>{{ $l->desc_lembur }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>

                    </div>
                </div><!-- /.container-fluid -->

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
    <script>

      $(document).ready(function() {
        $('#MyTable').DataTable( {
              initComplete: function () {
                  this.api().columns().every( function () {
                      var column = this;
                      var select = $('<select><option value=""></option></select>')
                          .appendTo( $(column.footer()).empty() )
                          .on( 'change', function () {
                              var val = $.fn.dataTable.util.escapeRegex(
                                  $(this).val()
                              );
                      //to select and search from grid
                              column
                                  .search( val ? '^'+val+'$' : '', true, false )
                                  .draw();
                          } );

                      column.data().unique().sort().each( function ( d, j ) {
                          select.append( '<option value="'+d+'">'+d+'</option>' )
                      } );
                  } );
              }
          } );
      } );
      $(document).ready(function() {
        $('#MyTable2').DataTable( {
              initComplete: function () {
                  this.api().columns().every( function () {
                      var column = this;
                      var select = $('<select><option value=""></option></select>')
                          .appendTo( $(column.footer()).empty() )
                          .on( 'change', function () {
                              var val = $.fn.dataTable.util.escapeRegex(
                                  $(this).val()
                              );
                      //to select and search from grid
                              column
                                  .search( val ? '^'+val+'$' : '', true, false )
                                  .draw();
                          } );

                      column.data().unique().sort().each( function ( d, j ) {
                          select.append( '<option value="'+d+'">'+d+'</option>' )
                      } );
                  } );
              }
          } );
      } );
      </script>

    <!-- jQuery -->
    @include('Template.script')
</body>
</html>
