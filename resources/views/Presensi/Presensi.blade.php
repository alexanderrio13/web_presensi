<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>Go-Blog | Presensi</title>
    @include('Template.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
/* notification css */
    .alert{
  /* background: #ffdb9b; */
  padding: 20px 40px;
  min-width: 220px;
  right: 0;
  top: 10px;
  border-radius: 4px;



  }

  .alert.showAlert{
    opacity: 0.85;
    pointer-events: auto;
  }
  .alert.show{
    animation: show_slide 6s ease forwards;
  }
  @keyframes show_slide {
    0%{
      transform: translateX(100%);
    }
    40%{
      transform: translateX(-10%);
    }
    80%{
      transform: translateX(0%);
    }
    100%{
      transform: translateX(-10px);
    }
  }
  .alert.hide{
    animation: hide_slide 6s ease forwards;
  }
  @keyframes hide_slide {
    0%{
      transform: translateX(-10px);
    }
    40%{
      transform: translateX(0%);
    }
    80%{
      transform: translateX(-10%);
    }
    100%{
      transform: translateX(0%);
    }
  }
  .alert .fa-exclamation-circle{
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #ce8500;
    font-size: 30px;
  }

  .alert .fa-check-circle{
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: green;
    font-size: 30px;
  }


    </style>

</head>
<body class="bt-spinner hold-transition sidebar-mini" onload="realtimeClock()">

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
                <div class="row justify-content-center" style="margin-left: 10px;margin-right: 10px;">
                    <div class="card card-info card-outline">
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
                        @if ($message = Session::get('warning'))
                        <div class="alert alert-warning show showAlert show_slide hide" style="border-left: 8px solid #ffa502;">
                          <button type="button" class="close" data-dismiss="alert"><span class="fas fa-times"></span></button>
                          <span class="fas fa-exclamation-circle"></span>
                          <span style="padding: 0 20px;font-size: 18px;color: #ce8500;">{{ $message }}</span>
                        </div>
                        @endif
                        @if ($message = Session::get('sukses'))
                        <div class="alert alert-success show hide showAlert show_slide" style="border-left: 8px solid green;">
                          <button type="button" class="close" data-dismiss="alert"><span class="fas fa-times"></span></button>
                          <span class="fas fa-check-circle"></span>
                          <span style="padding: 0 20px;font-size: 18px;color: green">{{ $message }}</span>
                        </div>
                        @endif
                        <div class="card-body" style="width:100%">

                                <div class="form-group">
                                  <center>
                                        <label id="clock" style="font-size: 40px; color: #0A77DE; -webkit-text-stroke: 2px #00ACFE;
                                                    text-shadow: 1px 1px 2px #36D6FE,
                                                    4px 4px 20px #36D6FE,
                                                    4px 4px 30px#36D6FE,
                                                    4px 4px 40px #36D6FE;">
                                        </label>
                                    </center>
                                </div>
                                <center>
                                  <div style="height:50px;width:80%;border-radius:45px;border-color:#17a2b8;border-style:thin;border-width:thin;background:#EFF1F1;margin-bottom:10px">

                                      <a style="font-size: 1em; color: #0A77DE; -webkit-text-stroke: 1.5px #00ACFE;
                                                text-shadow: 2px 2px 5px #0A77DE,
                                                font-family: Poppins;float:left;margin-left:5%">Jam masuk<br> 08:30
                                      </a>



                                      <i class="fa fa-clock-o fa-2x" aria-hidden="true" style="padding-top:3%"></i>


                                      <a style="font-size: 1em; color: #0A77DE; -webkit-text-stroke: 1.5px #00ACFE;
                                                text-shadow: 2px 2px 5px #0A77DE,
                                                font-family: Poppins;float:right;margin-right:5%">Jam pulang<br> 17:30
                                      </a>



                                  </div>

                                  <div class="parts-container" style="display:inline-block">

                                      <br/>


                                      <div id="form-group" style="float:left;margin-right:5px">
                                        <form action="{{ route('presensi-masuk') }}" method="get">

                                          <div class="form-group">
                                            <button type="submit" class="btn btn-info" style="padding: 12px;border-radius:15px " >
                                              <i class="fas fa-door-open" aria-hidden="true"></i>
                                              <a style="font-size:1em">Presensi Masuk</a>
                                            </button>
                                          </div>
                                        </form>

                                      </div>
                                      <div id="form-group" style="float:right;margin-left:5px">
                                      <form action="{{ route('presensi-keluar') }}" method="get">

                                          <center>
                                              <div class="form-group">
                                                  <button type="submit" class="btn btn-dark" style="padding: 12px;border-radius:15px">
                                                    <i class="fas fa-door-closed" aria-hidden="true"></i>
                                                    <a style="font-size:1em">Presensi Keluar</a>
                                                  </button>
                                              </div>
                                          </center>
                                      </form>
                                    </div>


                                  </div>
                                </center>


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
                    <p> Presensi Keluar : <strong>{{ $item->jamkeluar ?? '-' }}</strong> </p>
                    <p> Jam Kerja : <strong>{{ $item->jamkerja ?? '-' }}</strong> </p>
                    @endforeach


            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script>
    // $('button').click(function(){
    //        $('.alert').addClass("show");
    //        $('.alert').removeClass("hide");
    //        $('.alert').addClass("showAlert");
    //        setTimeout(function(){
    //          $('.alert').removeClass("show");
    //          $('.alert').addClass("hide");
    //        },5000);
    //      });
    //      $('.close-btn').click(function(){
    //        $('.alert').removeClass("show");
    //        $('.alert').addClass("hide");
    //      });
    </script>
    <!-- jQuery -->
    @include('Template.script')

</body>
</html>
