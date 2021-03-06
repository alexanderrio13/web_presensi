<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>Go-Blog | Laporan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <!-- sortable: Import js dari C:\xampp\htdocs\absensi\public\AdminLte\dist\js -->
    <script src="{{ asset('AdminLte/dist/js/sort-table.js') }}"></script>
    <!-- export table as excel -->
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    @include('Template.head')

</head>
<style>

  table {
    border-collapse: collapse;
    border-spacing: 0;
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

  tr:nth-child(even){background-color: #f2f2f2}


  * {
  box-sizing: border-box;
  }

  #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 20%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  float:right;
  }

  #myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 17px;
  }

  #myTable th, #myTable td {
  text-align: left;
  padding: 12px;
  }

  #myTable tr {
  border-bottom: 1px solid #ddd;
  }

  #myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
  }
  .table tbody tr:hover td, .table tbody tr:hover th {
  background-color: #eeeeea;
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
                          <form action="{{route('filter-result')}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                              <select id="select-state" required="required" class="form-control" name="user_id" placeholder="Select user..." onchange="testValue(this);">
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

                            <div class="form-group">
                                  <table class="table custom-table js-sort-table" id="MyTable" border="1" style="  table-layout: fixed;width: 100%;">
                                    <tr style="background:#bab8b8">
                                        <th>Karyawan</th>
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Jumlah Jam Kerja</th>
                                        <th>Caputer Masuk</th>
                                        <th>Capture Pulang</th>
                                        <th>Status Presensi</th>
                                    </tr>
                                    @foreach ($presensi as $item)
                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->tgl }}</td>
                                        <td>
                                          @if ($item->jammasuk > '08:30:59')
                                          <span class="badge badge-danger">Terlambat {{date('H:i:s',strtotime($item->jammasuk) - strtotime("08:31:00") - strtotime("14:07:12"))}}</span>
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
                                        <td>@if ($item->image_in)
                                          <a href="{{ asset("Rioadi/uploads_in/$item->image_in") }}" target="_blank"> {{ $item->image_in}}</a>
                                          @else
                                          <span class="badge badge-warning">No data</span>
                                          @endif
                                        </td>
                                        <td>@if ($item->image_out)
                                          <a href="{{ asset("Rioadi/uploads_out/$item->image_out") }}" target="_blank">{{ $item->image_out}}</a>
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

      // else {
      //
      //    window.open('filter-data/all','_self');
      //   }
    }
    // save table as excel
    function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('MyTable');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('RekapPresensi.' + (type || 'xlsx')));
    }
    </script>
    <!-- jQuery -->
    @include('Template.script')
</body>
</html>
