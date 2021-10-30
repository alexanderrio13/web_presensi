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
    <title>Go-Blog | Laporan</title>

    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- data tables pagination -->
    <link rel="Stylesheet" src="https://code.jquery.com/jquery-1.12.3.js">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="AdminLte/dist/fonts/icomoon/style.css">
    <link rel="stylesheet" href="AdminLte/dist/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdminLte/dist/css/bootstrap.min.css">
    <script src="AdminLte/dist/js/main.js"></script>
    <!-- sortable: Import js dari C:\xampp\htdocs\absensi\public\AdminLte\dist\js -->
    <script src="{{ asset('AdminLte/dist/js/sort-table.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <!-- export table as excel -->
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    @include('Template.head')

</head>
<style>

  table {
    border-collapse: collapse;
    border-spacing: 0;
    table-layout:fixed;
    /*border:0; */
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

   table-container {
     overflow: auto;
   }
</style>
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
                            <h1 class="m-0 text-dark">Rekap Presensi Karyawan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Rekap Prersensi Karyawan</li>
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
                        <div class="card-header">Lihat Data</div>
                        <div class="card-body">
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          <form action="{{route('filter-result-all')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                               <select required="required" class="form-control" name="user_id" placeholder="Select user..." onchange="testValue(this);">
                                 @foreach ($users as $user )
                                     <option></option>
                                     <option value="{{ $user->id }}">{{ $user->name }}</option>
                                     <option value="all users">(All Users)</option>
                                 @endforeach
                                </select>
                              </div>
                            <div class="form-group">
                                <label for="label">Tanggal Awal</label>
                                <input type="date" name="tglawal" id="tglawal" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="label">Tanggal Akhir</label>
                                <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Show</button>
                              <a type="button" class="btn btn-default" onclick="ExportToExcel('xlsx')"><i class="fa fa-print" aria-hidden="true"></i> Export </a>
                            </div>
                          </form>
                            <div <div style="overflow-x:auto;" class="table-responsive custom-table-responsive">
                                <table id="MyTable" class="table table-bordered custom-table js-sort-table" cellspacing="0" >
                                  <thead>
                                    <tr style="background:#bab8b8">
                                        <th scope="col" class="js-sort-string">Karyawan</th>
                                        <th scope="col"class="js-sort-date">Tanggal</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Pulang</th>
                                        <th scope="col">Jumlah Jam Kerja</th>
                                        <th scope="col">Status Presensi</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($presensi as $item)
                                    <tr>
                                        <td>{{ $item->user->name ?? '(deleted user)' }}</td>
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

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script>
    $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
    });


    function testValue(selection) {
    var x = document.getElementById("openwindow");
      if (selection.value == "all users") {

         window.open('/filter-data/all','_self');

        }

      else {

         window.open('/filter-data','_self');
        }
    }

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
    // save table as excel
    function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('MyTable');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('RekapPresensiAll.' + (type || 'xlsx')));
    }
    </script>
    <!-- jQuery -->
    @include('Template.script')
</body>
</html>
