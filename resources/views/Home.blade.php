<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Go-Blog | Karyawan Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- data tables pagination -->
    <link rel="Stylesheet" src="https://code.jquery.com/jquery-1.12.3.js">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- sortable: Import js dari C:\xampp\htdocs\absensi\public\AdminLte\dist\js -->
    <script src="{{ asset('AdminLte/dist/js/sort-table.js') }}"></script>
    @include('Template.head')
</head>
<style>

    table {
      border-collapse: collapse;
      border-spacing: 1;
      table-layout:auto;
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

    .table tbody tr:hover td, .table tbody tr:hover th {
    background-color: #eeeeea;
    }

    table-container {

    }
    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }

    /* Style the close button */
    .topright {
      float: right;
      cursor: pointer;
      font-size: 28px;
    }

    .topright:hover {
      color: red;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    .bio {
      margin-left:10px;
      margin-bottom:10px;
      float:right;
    }
    .col-25 {
      width:100px;
      float:left;
      margin-left:10px;
    }

    td.linebreak p {
        width: 50%;
    }


    td.fixed {
        height: 120px;
        display:inline-block;
        overflow: auto;
        white-space: pre-wrap;
        width:100%;
    }
    textarea {
    min-height: 60px;
    overflow-y: auto;
    word-wrap:break-word
    }

</style>
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
                            <h1 class="m-0 text-dark">Dashboard Karyawan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard Karyawan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body" style="text-align:center">
                                  <img src="/Rioadi/img/user.png" style="border-radius: 50%;">
                                    <div class="card-text">
                                      <br>
                                      {{ auth()->user()->name }} <br>
                                      <a style="font-size:1.05em">{{ auth()->user()->jabatan }}</a>


                                  </div>


                                </div>
                            </div>

                            <div class="card card-primary card-outline">
                              <div class="card-header">
                                  <h5 class="m-0">About Me</h5>
                              </div>
                                <div class="card-body">
                                    <div class="card-text" style="width:75%;">
                                      <form action="/home/update" method="post">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="id" value="{{ $user->id}}">
                                      <div class="row">
                                        <div class="col-25">
                                          <label f  or="fname">Email : </label>
                                        </div>
                                        <div class="col-75 bio">
                                              <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-25">
                                          <label f  or="fname">Password : </label>
                                        </div>
                                        <div class="col-75 bio">
                                              <input type="password" class="form-control" name="password" value="{{$user->password}}" required>
                                              <!-- <input type="checkbox" onclick="myFunction()"> Show Password -->
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-25">
                                          <label for="fname">Phone : </label>
                                        </div>
                                        <div class="col-75 bio">
                                          <input type="text" class="form-control" name="phone" maxlength="19" value="{{$user->phone}}" required>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-25">
                                          <label for="lname">TTL : </label>
                                        </div>
                                        <div class="col-75 bio">
                                            <input type="text" class="form-control" name="ttl" value="{{$user->ttl}}" required>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-25">
                                          <label for="fname">Address : </label>
                                        </div>
                                        <div class="col-75 bio">
                                          <textarea class="form-control" name="address" style="white-space: pre-wrap; width:110%" required>{{$user->address}}</textarea>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-25">
                                          <label for="fname">Gender : </label>
                                        </div>
                                        <div class="col-75 bio" style="padding-top:10px">
                                          @if($user->gender == "Male")

                                           <input type="radio" name="gender" value="Male" checked> Male </input>
                                           <input type="radio" name="gender" value="Female" style="margin-left:10px"> Female </input>

                                         @else
                                           <input type="radio" name="gender" value="Male"> Male </input>
                                           <input type="radio" name="gender" value="Female" style="margin-left:10px" checked> Female </input>

                                         @endif
                                        </div>
                                      </div>

                                      <div class="form-group" style="position:relative;">
                                        <div style="float:right;margin-right: 30px;">
                                          <input type="reset" class="btn btn-warning" value="Cancel">
                                        </div>
                                        <div style="float:right;margin-right: 10px;">
                                          <button type="submit"  class="btn btn-primary btn-block">Update Data</button>
                                        </div>
                                      </div>
                                      </form>

                                    </div>

                                </div>
                            </div><!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-8">
                            <div class="card ">
                                  <div class="tab">
                                      <button class="tablinks" onclick="openCity(event, 'Report')" id="defaultOpen">Report</button>
                                      <button class="tablinks" onclick="openCity(event, 'Notes')" >Notes</button>
                                    <!-- <button class="tablinks" onclick="openCity(event, 'Notes')">Notes</button> -->
                                  </div>

                                    <div id="Report" class="tabcontent" style="overflow-x:auto;">
                                      <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                                      <h3>Laporan Kerja</h3>
                                      <a type="button" class="btn btn-success float-left mb-1" data-toggle="modal" data-target="#modalCreateReport"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                      <br>
                                      <!-- ini modalnya ADD-->
                                      <div class="modal fade" id="modalCreateReport" tabindex="-1" aria-labelledby="modalCreateReport" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Add New Report</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <!--ini formnya-->

                                                <form action="{{action('HomeController@reportStore')}}" method="post">
                                                  {{ csrf_field() }}
                                                  <input name="user_id" type="hidden" value={{$user_id}}>
                                                  <div class="form-group">
                                                  <label for="">Subject</label>
                                                  <input type="text" class="form-control" id="addSubject" name="addSubject" >
                                                  </div>
                                                  <div class="form-group">
                                                  <label for="">Content</label>
                                                  <textarea class="form-control" id="addContent" name="addContent" style="white-space: pre-wrap;height:120px"></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                  <label for="">Status</label>
                                                      <br>
                                                      <input type="radio" id="addStatus" name="addStatus" value="Solved" checked> Solved </input>
                                                      <input type="radio" id="addStatus" name="addStatus" value="Pending" style="margin-left:10px"> Pending </input>

                                                  </div>
                                                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                </form>
                                          <!--end form-->
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ini modalnya EDIT -->
                                      @foreach ($reports as $report)
                                      <div class="modal fade" id="modalEditReport{{$report->id}}" tabindex="-1" aria-labelledby="modalEditReport" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Edit Report</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <!--ini formnya-->
                                                <form action="/home/report/edit/{{$report->id}}" method="post">
                                                  {{ csrf_field() }}
                                                  @method('put')
                                                  <input name="user_id" type="hidden" value={{$user_id}}>
                                                  <div class="form-group">
                                                    <label >Subject</label>
                                                    <input type="text" class="form-control" id="editSubject" name="editSubject" value="{{$report->subject}}">
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Content</label>
                                                    <textarea class="form-control" id="editContent" name="editContent" style="white-space: pre-wrap;height:120px" >{{$report->content}}</textarea>
                                                  </div>
                                                  <div class="form-group">
                                                  <label >Status</label>
                                                  <br>
                                                  @if($report->status == "Solved")
                                                      <input type="radio" id="editStatus" name="editStatus" value="Solved" checked> Solved </input>
                                                      <input type="radio" id="editStatus" name="editStatus" value="Pending" style="margin-left:10px"> Pending </input>
                                                  @else
                                                  <input type="radio" id="editStatus" name="editStatus" value="Solved"> Solved </input>
                                                  <input type="radio" id="editStatus" name="editStatus" value="Pending" style="margin-left:10px" checked> Pending </input>
                                                  @endif

                                                  </div>
                                                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                </form>
                                            <!--end form-->
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endforeach
                                      <table id="MyTable" class="table table-bordered custom-table js-sort-table" cellspacing="0">
                                        <thead>
                                          <tr style="background:#bab8b8">
                                              <th style="width:5%" class="js-sort-string">Tanggal</th>
                                              <th style="width:15%" >Subject</th>
                                              <th style="width:60%" >Content</th>
                                              <th style="width:5%" >Status</th>
                                              <th style="width:15%" >Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($reports as $report)
                                          <tr>
                                            <td>{{$report->created_at}}</td>
                                            <td >{{$report->subject}}</td>
                                            <td class="fixed">{{$report->content}}</td>
                                            <td >{{$report->status}}</td>
                                            <td >
                                              <a href="/home/report/hapus/{{$report->id}}" onclick="return confirm('Are you sure want to delete {{$report->subject}} report?')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                              <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditReport{{ $report->id }}"><i class="fas fa-edit"></i></a>
                                            </td>
                                          </tr>
                                        @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                    <div id="Notes" class="tabcontent">
                                      <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                                      <h3>Personal Notes</h3>
                                      <p>Add/edit your personal notes here : </p>

                                      <form action="/home/update/note" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $user->id}}">


                                            <div>
                                                <textarea rows="4" onkeyup="adjustHeight(this)" class="form-control" name="note">{{$user->note}}</textarea>
                                            </div>

                                            <div style="float:right;margin-right: 75px;margin-top:10px">
                                              <button type="submit"  class="btn btn-primary btn-block">Save</button>
                                            </div>

                                      </form>

                                    </div>

                                    <div id="Notes" class="tabcontent">
                                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                                    <h3>Tokyo</h3>
                                    <p>Tokyo is the capital of Japan.</p>
                                    </div>

                            </div>


                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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
            </div> -->
        <!-- </aside> -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

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
        $(document).ready(function(){
            $(".moveTo").click(function(){
                var elemId = $(this).attr('href')
                $(elemId).find('a:first').click();
            });
        });
        function adjustHeight(el){
            el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
        }
        
    </script>
    <!-- jQuery -->
    @include('Template.script')
</body>
</html>
