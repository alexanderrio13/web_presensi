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
    <!-- js buat sidebar -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
    .custom-width{
      width:50%;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 1024px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
      .custom-width{
        width:90%;
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
                            <h1 class="m-0 text-dark"><i class="fa fa-file"></i> Add Form </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Form Lembur</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="custom-width container card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">Isi Form Lembur</h5>
                </div>
                <div class="card-body">
                    <div  style="width:100%;margin:auto">
                      <form action="/lembur/store" method="post">
                        {{ csrf_field() }}
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Tugas Yang Dikerjakan</label>
                        </div>
                        <div class="col-75">
                          <textarea class="form-control" name="desc_lembur" rows="10" cols="30" required></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Tanggal</label>
                        </div>
                        <div class="col-75">
                          <input type="date" class="form-control" name="tgl" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Mulai</label>
                        </div>
                        <div class="col-75">
                          <input type="time" class="form-control" name="lemburmasuk" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Selesai</label>
                        </div>
                        <div class="col-75">
                          <input type="time" class="form-control" name="lemburkeluar" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Mengetahui SPV</label>
                        </div>
                        <div class="col-75">
                          <p>
                            <input type="radio" name="statuslembur" value="yes" checked>Yes</input>
                            </p>
                            <p>
                            <input type="radio" name="statuslembur" value="no">No</input>
                            </p>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input name="user_id" type="hidden" value={{$user_id}}>

                      </div>
                      <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">Save</button>

                      </div>
                      </form>
                    </div>
                </div>
            </div>



            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- <aside class="control-sidebar control-sidebar-dark"> -->
            <!-- Control sidebar content goes here -->
            <!-- <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> -->
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
