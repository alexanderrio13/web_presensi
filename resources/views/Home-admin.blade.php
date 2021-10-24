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

    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="AdminLte/dist/fonts/icomoon/style.css">

    <link rel="stylesheet" href="AdminLte/dist/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdminLte/dist/css/bootstrap.min.css">

    <!-- Style -->
    <!-- <link rel="stylesheet" href="AdminLte/dist/css/style.css"> -->

    <script src="AdminLte/dist/js/jquery-3.3.1.min.js"></script>
    <script src="AdminLte/dist/js/popper.min.js"></script>
    <script src="AdminLte/dist/js/bootstrap.min.js"></script>
    <script src="AdminLte/dist/js/main.js"></script>
    <!-- sortable: Import js dari C:\xampp\htdocs\absensi\public\AdminLte\dist\js -->
    <script src="{{ asset('AdminLte/dist/js/sort-table.js') }}"></script>
    @include('Template.head')

    <style>
    table {
      border-collapse: collapse;
      border-spacing: 0;
      /* table-layout:fixed;
      border:0; */
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
                            <h1 class="m-0 text-dark">Dashboard</h1>
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
            <div class="right_col" role="main" style="padding-left:10px;padding-right:10px">
                    <div class="row justify-content-center">
                        <div class="card card-info card-outline" style="width:100%;margin-right:10px;margin-left:10px;">
                          <div class="card-header">
                            <div style="float:left;margin-left:10px">
                              <h2 class="m-0 text-dark"><i class="fas fa-clock"></i> Today's Precence(s) </h2>
                            </div>
                            <div style="float:right">
                              <p id="GFG_UP"
                              style="font-size: 25px;
                                  font-weight: normal;">
                              </p>
                              <script>
                                  var el_up = document.getElementById("GFG_UP");
                                  var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                                  var day = days[new Date().getDay()];
                                  var today = new Date();
                                  var date = today.getDate();
                                  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                  var month = months[new Date().getMonth()];
                                  var year = today.getFullYear();
                                  el_up.innerHTML = day+', '+month+' '+date+' '+year;
                              </script>
                            </div>
                          </div>
                        <div class="card-body">


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
                    </div>
                  </div>

                  <!-- table   -->

                <div style="overflow-x:auto;" class="table-responsive custom-table-responsive">
                  <div class="row justify-content-center">
                      <div class="card card-info card-outline" style="width:100%;margin-right:10px;margin-left:10px">
                        <div class="card-header">
                          <div style="float:left;margin-left:10px">
                            <h2 class="m-0 text-dark"><i class="fas fa-user-tie"></i><strong> Users </strong></h2>
                          </div>
                          <div style="float:left;margin-left:15px">
                            <a href="/karyawan/tambah" style="float:left" type="button" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i></i> Add New</a>
                          </div>
                          <div style="max-width:400px;margin:auto;float:right">
                            <div class="input-icons">
                              <i class="fas fa-search icon"></i>
                              <input type="text" id="myInput" class="input-field" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
                            </div>
                          </div>

                        </div>
                        <div class="card-body">
                          <table id="myTable" class="table custom-table js-sort-table" border="1">
                              <tr style="background:#bab8b8">

                                  <th class="js-sort-string">Name</th>
                                  <th>Email</th>
                                  <th>Level</th>
                                  <th class="js-sort-string">Position</th>
                                  <th>Action</th>
                              </tr>
                              @foreach ($karyawan as $k)
                              <tr>

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
                </div> <!-- table -->



            <!-- /.main content -->
        </div>
        <!-- /.content-wrapper -->


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
