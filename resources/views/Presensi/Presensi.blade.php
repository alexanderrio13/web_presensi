<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>Go-Blog | Presensi</title>
    @include('Template.head')
    
    <script src="{{ asset('Js/jam.js') }}"></script>
    <style>
        #watch {
            color: rgb(252, 150, 65);
            position: absolute;
            z-index: 1;
            height: 40px;
            width: 700px;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            font-size: 10vw;
            -webkit-text-stroke: 3px rgb(210, 65, 36);
            text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
                4px 4px 20px rgba(210, 45, 26, 0.4),
                4px 4px 30px rgba(210, 25, 16, 0.4),
                4px 4px 40px rgba(210, 15, 06, 0.4);
        }
        .parts-container {
            position: relative;
            }

        .part1 {
            position: absolute;
            left: 0;
            top: 0;
        }
        .hidden-div {
        visibility:hidden;
    }

    </style>

</head>
<body class="hold-transition sidebar-mini" onload="realtimeClock()">

    <div class="wrapper">

        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.left-sidebar')
        <!-- Session message for take snapshot  -->
        @include('Presensi.msg')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Presensi</h1>


                            </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard-karyawan')}}">Home</a></li>
                                <li class="breadcrumb-item active">Presensi</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="row justify-content-center">
                    <div class="card card-info card-outline" >
                        <div class="card-header" style="margin:0 auto;">
                          <p id="GFG_UP"
                          style="font-size: 35px;
                              font-weight: bold;">
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
                        <div class="card-body">

                                <div class="form-group">

                                    <center>
                                        <label id="clock" style="font-size: 40px; color: #0A77DE; -webkit-text-stroke: 3px #00ACFE;
                                                    text-shadow: 2px 2px 5px #36D6FE,
                                                    4px 4px 20px #36D6FE,
                                                    4px 4px 30px#36D6FE,
                                                    4px 4px 40px #36D6FE;">
                                        </label>
                                    </center>
                                </div>
                                <center>
                                  <div class="parts-container">

                                      <br/>


                                      <div id="form-group">
                                        <form action="{{ route('presensi-masuk') }}" method="get">

                                          <div class="form-group">
                                            <button type="submit" class="btn btn-info">Presensi Masuk</button>
                                          </div>
                                        </form>

                                      </div>

                                  </div>
                                </center>

                            <form action="{{ route('presensi-keluar') }}" method="get">

                                <center>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Presensi Keluar</button>
                                    </div>
                                </center>
                            </form>

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
                <h5>Today's Activity</h5>
                <br>
                @foreach ($presensi as $item)
                    <p> Presensi Masuk : <strong>{{ $item->jammasuk }}</strong> </p>
                    <p> Status :
                    @if ($item->jammasuk > '08:30:59')
                    <span class="badge badge-danger">Terlambat</span>
                    @else
                    <span class="badge badge-success">On Time</span>
                    @endif
                    </p>
                    <p> Presensi Keluar : <strong>{{ $item->jamkeluar }}</strong> </p>
                    <p> Jam Kerja : <strong>{{ $item->jamkerja }}</strong> </p>
                    <p> Status Lembur :
                    @if ($item->jamkerja > '08:59:59')
                    <span class="badge badge-success">Dapat Lembur</span>
                    @else
                    <span class="badge badge-warning">Tidak Lembur</span>
                    @endif
                    </p>
                    @endforeach


            </div>
        </aside>
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
