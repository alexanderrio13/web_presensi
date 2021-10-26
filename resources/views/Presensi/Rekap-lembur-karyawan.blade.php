<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>Go-Blog | Rekap Lembur</title>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">


    <!-- sortable: Import js dari C:\xampp\htdocs\absensi\public\AdminLte\dist\js -->
    <script src="{{ asset('AdminLte/dist/js/sort-table.js') }}"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    @include('Template.head')
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

  tr:nth-child(even){
    background-color: #f2f2f2
  }

  * {
  box-sizing: border-box;
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

  #myInput {
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  margin-bottom: 12px;
  float:right;
  text-shadow: 0 0 1px white;
  height: 40px;
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
                            <h1 class="m-0 text-dark">Rekap Lembur Karyawan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Rekap Lembur Karyawan</li>
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
                          <div class="form-group">
                            <div style="max-width:400px;margin:auto;float:right">
                              <div class="input-icons">
                                <i class="fas fa-search icon"></i>
                                <input type="text" id="myInput" class="input-field" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
                              </div>
                            </div>
                            <table id="myTable" class="table custom-table js-sort-table" border="1" style="  table-layout: fixed;width: 100%;">
                                <tr style="background:#bab8b8">
                                  <th class="js-sort-string">Nama</th>
                                  <th>Tanggal</th>
                                  <th>Mulai</th>
                                  <th>Selesai</th>
                                  <th>Jumlah Lembur</th>
                                  <th>Mengetahui SPV</th>
                                  <th>Pengerjaan</th>
                                </tr>
                                @foreach ($lembur as $l)
                                <tr>
                                  <td>{{ $l->user->name }}
                                  <td>{{ $l->tgl }}</td>
                                  <td>{{ $l->lemburmasuk }}</td>
                                  <td>{{ $l->lemburkeluar }}</td>
                                  <td>{{ $l->lamalembur }}</td>
                                  <td>{{ $l->statuslembur }}</td>
                                  <td>{{ $l->desc_lembur }}</td>
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

    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }


    </script>
    <!-- jQuery -->
@include('Template.script')

</body>
</html>
