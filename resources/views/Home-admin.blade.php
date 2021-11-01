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
        <!-- chart src -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <!-- sortable: Import js dari C:\xampp\htdocs\absensi\public\AdminLte\dist\js -->
        <script src="{{ asset('AdminLte/dist/js/sort-table.js') }}"></script>

        <script src="AdminLte/dist/js/main.js"></script>
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
            <div class="right_col" role="main" style="padding-left:10px;padding-right:10px;">


              <div style="margin:auto;height:470px;">
                <div class="row justify-content-center" style="width:50%;height:100%;float:left">
                    <div class="card card-info card-outline" style="width:100%;margin-right:10px;margin-left:10px;">
                      <div class="card-header">
                        <div style="float:left;margin-left:10px">
                          <h2 class="m-0 text-dark"><i class="fas fa-clock"></i> Today's Presence(s) </h2>
                        </div>
                        <div style="float:right">
                          <p id="GFG_UP"
                          style="font-size: 17px;
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
                    <div style="height:50%;width:193%;padding:20px;padding-top:50px">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="height:125px;">
                          <div class="icon" style="margin-left:5px"><i class="fa fa-user"></i>
                          </div>
                          <div class="count">
                            {{$today_presensi->count()}}
                          </div>
                          <h3>Sudah Presensi</h3>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="height:125px">
                          <div class="icon"><i class="fa fa-warning"></i>
                          </div>
                          <div class="count">
                            {{$tot_karyawan->count() - $today_presensi->count() }}
                          </div>
                          <h3>Belum Presensi</h3>
                        </div>
                      </div>
                    </div>
                <div style="height:50%;width:193%;padding:20px;padding-top:10px">
                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats" style="height:125px;">
                      <div class="icon"><i class="fa fa-bell-slash"></i>
                      </div>
                      <div class="count">
                        {{$today_terlambat->count()}}
                      </div>
                      <h3>Terlambat</h3>
                    </div>
                  </div>
                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats" style="height:125px">
                      <div class="icon"><i class="fa fa-group"></i>
                      </div>
                      <div class="count">
                        {{$tot_karyawan->count()}}
                      </div>
                      <h3>Total Karyawan</h3>
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div style="float:right;width:50%;height:100%;">
                <div class="card card-info card-outline" style="height:450px;margin-right:5px;margin-left:0px;">
                  <div class="card-header">
                    <div style="float:left;margin-left:10px">
                      <h2 class="m-0 text-dark"><i class="fa fa-line-chart"></i> Monthly Presence Activities </h2>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="panel-body" style="width:100%;">
                        <canvas id="canvas"></canvas>
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
                          <div style="float:right;margin-left:15px">
                            <a href="/karyawan/tambah" style="float:left" type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></i></a>
                          </div>
                        </div>
                        <div class="card-body">
                          <table id="MyTable" class="table table-bordered custom-table js-sort-table" cellspacing="0">
                            <thead>
                              <tr style="background:#bab8b8">

                                  <th class="js-sort-string">Name</th>
                                  <th>Email</th>
                                  <th>Level</th>
                                  <th class="js-sort-string">Position</th>
                                  <th>Created At</th>
                                  <th>Last Seen</th>
                                  <th>Last Seen Ip</th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                              @foreach ($tot_karyawan as $k)
                              <tr>

                                  <td>{{$k->name}}</td>
                                  <td>{{$k->email}}</td>
                                  <td>{{$k->level}}</td>
                                  <td>{{$k->jabatan}}</td>
                                  <td>{{$k->created_at}}</td>
                                  <td>{{$k->last_login_at}}</td>
                                  <td>{{$k->last_login_ip}}</td>
                                  <td>
                                      <a href="/karyawan/hapus/{{$k->id}}" onclick="return confirm('Are you sure want to delete {{$k->name}} ?')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                      <a href="/karyawan/edit/{{$k->id}}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
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


  var month = <?php echo $month; ?>;
      var null_pulang = <?php echo $null_pulang; ?>;
      var terlambat = <?php echo $terlambat; ?>;
      var ontime = <?php echo $ontime; ?>;
      var barChartData = {
          labels: month,
          datasets: [{
              label: 'Tidak Absen Pulang',
              backgroundColor: "#65ccb6",
              borderColor: "#44c2a8",
              data: null_pulang
          },
          {
              label: 'Terlambat',
              backgroundColor: "#d0d4d7",
              borderColor: "#c8ced1",
              data: terlambat
          },
          {
            label: 'On time',
            backgroundColor: "#707e8d",
            borderColor: "#3e5266",
            data: ontime
        }
        ]
      };

      window.onload = function() {
          var ctx = document.getElementById("canvas").getContext("2d");
          window.myBar = new Chart(ctx, {
              type: 'bar',
              data: barChartData,
              options: {
                  elements: {
                      rectangle: {
                          borderWidth: 1,
                          // borderColor: '#c1c1c1',
                          borderSkipped: 'bottom'
                      }
                  },
                  responsive: true,
                  title: {
                      display: true,
                      text: ''
                  }
              }
          });
      };

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
</script>
    <!-- jQuery -->
    @include('Template.script')
</body>
</html>
