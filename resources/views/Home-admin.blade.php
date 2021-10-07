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
    <!-- Bootstrap -->
    <!-- <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    @include('Template.head')
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
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-user"></i>
                          </div>
                          <div class="count">

                            {{$sudahpresensi->count()}}

                          </div>

                          <h3>Sudah Presensi</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-warning"></i>
                          </div>
                          <div class="count">
                            {{$belumpresensi->count()}}
                          </div>

                          <h3>Belum Presensi</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-bell-slash"></i>
                          </div>
                          <div class="count">
                            {{$terlambat->count()}}
                          </div>

                          <h3>Terlambat</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-group"></i>
                          </div>
                          <div class="count">
                            {{$totkaryawan->count()}}
                          </div>

                          <h3>Total Karyawan</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>
                    </div>






                    <br />
                    <div class="row">
                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_title">
                            <h2>Tally Design</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 0;">
                              <canvas id="canvas_line1" height="200"></canvas>
                            </div>

                            <div style="text-align: center; margin-bottom: 15px;">
                              <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" class="btn btn-default btn-sm">Day</button>
                                <button type="button" class="btn btn-default btn-sm">Month</button>
                                <button type="button" class="btn btn-default btn-sm">Year</button>
                              </div>
                            </div>

                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_title">
                            <h2>Sales Close</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <ul class="verticle_bars list-inline">
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-dark" role="progressbar" data-transitiongoal="65"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-gray" role="progressbar" data-transitiongoal="85"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-info" role="progressbar" data-transitiongoal="45"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="75"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            <div class="divider"></div>

                            <ul class="legend list-unstyled">
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square dark"></i></span> <span class="name">Item One Name</span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square grey"></i></span> <span class="name">Item Two Name</span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square blue"></i></span> <span class="name">Item Three Name</span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square green"></i></span> <span class="name">Item Four Name</span>
                                </p>
                              </li>
                            </ul>

                          </div>
                        </div>
                      </div>


                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel ui-ribbon-container fixed_height_390">
                          <div class="ui-ribbon-wrapper">
                            <div class="ui-ribbon">
                              30% Off
                            </div>
                          </div>
                          <div class="x_title">
                            <h2>User Mail</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <h3 class="name_title">Finance</h3>
                            <p>Short Description</p>

                            <div class="divider"></div>

                            <p>If you've decided to go in development mode and tweak all of this a bit, there are few things you should do.</p>

                          </div>
                        </div>
                      </div>


                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_content">

                            <div class="flex">
                              <ul class="list-inline widget_profile_box">
                                <li>
                                  <a>
                                    <i class="fa fa-facebook"></i>
                                  </a>
                                </li>
                                <li>
                                  <img src="images/user.png" alt="..." class="img-circle profile_img">
                                </li>
                                <li>
                                  <a>
                                    <i class="fa fa-twitter"></i>
                                  </a>
                                </li>
                              </ul>
                            </div>

                            <h3 class="name">Musimbi</h3>

                            <div class="flex">
                              <ul class="list-inline count2">
                                <li>
                                  <h3>123</h3>
                                  <span>Articles</span>
                                </li>
                                <li>
                                  <h3>1234</h3>
                                  <span>Followers</span>
                                </li>
                                <li>
                                  <h3>123</h3>
                                  <span>Following</span>
                                </li>
                              </ul>
                            </div>
                            <p>
                              If you've decided to go in development mode and tweak all of this a bit, there are few things you should do.
                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Tally Design1</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                              <canvas id="canvas_doughnut" height="130"></canvas>
                            </div>

                            <div style="text-align: center;">
                              <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" class="btn btn-default btn-sm">1 D</button>
                                <button type="button" class="btn btn-default btn-sm">1 W</button>
                                <button type="button" class="btn btn-default btn-sm">1 M</button>
                                <button type="button" class="btn btn-default btn-sm">1 Y</button>
                              </div>
                            </div>
                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;">
                              <canvas id="canvas_line" height="190"></canvas>
                            </div>
                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>



                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Tally Design2</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                              <canvas id="canvas_doughnut2" height="130"></canvas>
                            </div>

                            <div style="text-align: center;">
                              <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" class="btn btn-default btn-sm">1 D</button>
                                <button type="button" class="btn btn-default btn-sm">1 W</button>
                                <button type="button" class="btn btn-default btn-sm">1 M</button>
                                <button type="button" class="btn btn-default btn-sm">1 Y</button>
                              </div>
                            </div>
                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;">
                              <canvas id="canvas_line2" height="190"></canvas>
                            </div>
                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Tally Design3</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                              <canvas id="canvas_doughnut3" height="130"></canvas>
                            </div>

                            <div style="text-align: center;">
                              <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" class="btn btn-default btn-sm">1 D</button>
                                <button type="button" class="btn btn-default btn-sm">1 W</button>
                                <button type="button" class="btn btn-default btn-sm">1 M</button>
                                <button type="button" class="btn btn-default btn-sm">1 Y</button>
                              </div>
                            </div>
                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;">
                              <canvas id="canvas_line3" height="190"></canvas>
                            </div>
                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Tally Design4</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                              <canvas id="canvas_doughnut4" height="130"></canvas>
                            </div>

                            <div style="text-align: center;">
                              <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" class="btn btn-default btn-sm">1 D</button>
                                <button type="button" class="btn btn-default btn-sm">1 W</button>
                                <button type="button" class="btn btn-default btn-sm">1 M</button>
                                <button type="button" class="btn btn-default btn-sm">1 Y</button>
                              </div>
                            </div>
                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;">
                              <canvas id="canvas_line4" height="190"></canvas>
                            </div>
                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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

    <!-- jQuery -->
    @include('Template.script')
</body>
</html>
