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
    <title>Go-Blog | Admin Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- sortable: Import js dari C:\xampp\htdocs\absensi\public\AdminLte\dist\js -->
    <script src="{{ asset('AdminLte/dist/js/sort-table.js') }}"></script>
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    @include('Template.head')

    <style>
    table {
      border-collapse: collapse;
      border: 1px solid black;
    }

    th,td {
      border: 1px solid black;
    }
    table.d {
      table-layout: fixed;
      width: 100%;
    }

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
    font-size: 18px;
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
                            <h1 class="m-0 text-dark">Dashboard Admin</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="right_col" role="main">

            <div class="clearfix"></div>

              <div class="col-md-12">

                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="height:125px">
                          <div class="icon"><i class="fa fa-user"></i>
                          </div>
                          <div class="count">
                            {{$sudahpresensi->count()}}
                          </div>
                          <h3>Sudah Presensi</h3>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="height:125px">
                          <div class="icon"><i class="fa fa-warning"></i>
                          </div>
                          <div class="count">
                            {{$karyawan->count() - $sudahpresensi->count() }}
                          </div>
                          <h3>Belum Presensi</h3>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="height:125px">
                          <div class="icon"><i class="fa fa-bell-slash"></i>
                          </div>
                          <div class="count">
                            {{$terlambat->count()}}
                          </div>
                          <h3>Terlambat</h3>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="height:125px">
                          <div class="icon"><i class="fa fa-group"></i>
                          </div>
                          <div class="count">
                            {{$karyawan->count()}}
                          </div>

                          <h3>Total Karyawan</h3>
                        </div>
                      </div>
                    </div>






                    <br />
                    <div class="form-group">
                    <div style="float:left;margin-left:10px">
                      <h2 class="m-0 text-dark"><i class="fas fa-user-tie"></i><strong> Users </strong></h2>
                    </div>
                    <div style="float:left;margin-left:15px">
                      <a href="/karyawan/tambah" style="float:left" type="button" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i></i> Add New</a>
                    </div>
                      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                        <table id="myTable" class="w3-table-all js-sort-table" style="  table-layout: fixed;width: 100%;" >
                            <tr class="w3-hover-cyan">

                                <th class="js-sort-string">Name</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th class="js-sort-string">Position</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($karyawan as $k)
                            <tr class="w3-hover-cyan">

                                <td>{{$k->name}}</td>
                                <td>{{$k->email}}</td>
                                <td>{{$k->level}}</td>
                                <td>{{$k->jabatan}}</td>
                                <td>
                                    <a href="/karyawan/hapus/{{$k->id}}" onclick="return confirm('Are you sure want to delete {{$k->name}} ?')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    <a href="/karyawan/edit/{{$k->id}}" type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                </td>


                            </tr>
                            @endforeach
                        </table>

                    </div>
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
