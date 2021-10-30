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

    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- drop down sidebar -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="AdminLte/dist/fonts/icomoon/style.css">
    <link rel="stylesheet" href="AdminLte/dist/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdminLte/dist/css/bootstrap.min.css">

    <script src="AdminLte/dist/js/main.js"></script>
    <!-- export table as excel -->
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    @include('Template.head')

    <style>
    * {
      box-sizing: border-box;
    }

    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
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
                            <h1 class="m-0 text-dark"><i class="fas fa-user-tie"></i><strong> Edit User</strong></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="container card card-primary card-outline" style="width:600px;">
                <div class="card-header">
                    <h5 class="m-0">Edit User</h5>
                </div>
                <div class="card-body">
                  <div class="container" style="width:500px;">
                    @foreach ($users as $user)
                    <form action="/karyawan/update" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Name</label>
                      </div>
                      <div class="col-75">
                        <input type="text" class="form-control" name="name" maxlength="19" value="{{ $user->name }}" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Email</label>
                      </div>
                      <div class="col-75">
                          <input type="text" class="form-control" name="email" maxlength="19" value="{{ $user->email }}" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Password</label>
                      </div>
                      <div class="col-75">
                          <input type="text" class="form-control" name="password" maxlength="19" value="{{ $user->password }}" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Posisiton</label>
                      </div>
                      <div class="col-75">
                          <input type="text" class="form-control" name="jabatan" maxlength="19" value="{{ $user->jabatan }}" required>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <input name="level" type="hidden" value="karyawan">

                    </div>
                    <div class="form-group" style="position:relative;">
                      <div style="float:right;margin-right: 30px;">
                        <a href="/admin-dashboard" class="btn btn-warning">Cancel</a>
                      </div>
                      <div style="float:right;margin-right: 10px;">
                        <button type="submit"  class="btn btn-primary btn-block">Save</button>
                      </div>
                    </div>
                    </form>
                    @endforeach
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
