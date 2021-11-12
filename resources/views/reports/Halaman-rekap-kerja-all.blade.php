<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>Go-Blog | Rekap Kerja</title>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    @include('Template.head')

<style>
  diff-option {
   color : red;
   background:red;
  }
  other-options{
   color:black;
   background:black;
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
                            <h1 class="m-0 text-dark">Rekap Kerja Karyawan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Rekap Kerja Karyawan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="row justify-content-center">
                    <div class="card card-info card-outline" style="width:100%;margin-right:10px;margin-left:10px">
                      <div class="card-header">Lihat Data</div>
                        <div class="card-body">
                          <form action="{{route('rekap-kerja-result-all')}}" method="post">
                            {{ csrf_field() }}
                              <div class="form-group">
                                    <select id="select-state" required="required" class="form-control" name="user_id" placeholder="Select user..." onchange="testValue(this);">



                                            <option value="all users">(All Users)</option>

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
                                <div class="form-group" style="position:relative;">
                                  <div style="float:left;">
                                    <a href="/rekap-kerja" class="btn btn-warning"> Back </a>
                                  </div>
                                  <div style="float:left;margin-left:5px">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Show</i></button>
                                  </div>
                                </div>
                          </form>
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
    </script>
    <!-- jQuery -->
@include('Template.script')

</body>
</html>
