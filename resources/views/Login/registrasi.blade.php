<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Go-Blog | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('AdminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet">
    <style>
    html, body {
        height: 100%;
    }
    html { background: #E1F3FF;
      padding-left: 50px;
      padding-right: 50px;
      padding-top: 30px;

     }
        body {background: linear-gradient(127deg, #A6EDFF, #0E9AA9, #E1F3FF);
    background-size: 800% 800%;
    border-radius: 40px;
    padding: 10px;

    -webkit-animation: AnimationName 30s ease infinite;
    -moz-animation: AnimationName 30s ease infinite;
    animation: AnimationName 30s ease infinite;
}

@-webkit-keyframes AnimationName {
    0%{background-position:0% 9%}
    50%{background-position:100% 92%}
    100%{background-position:0% 9%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 9%}
    50%{background-position:100% 92%}
    100%{background-position:0% 9%}
}
@keyframes AnimationName {
    0%{background-position:0% 9%}
    50%{background-position:100% 92%}
    100%{background-position:0% 9%}
}
        .centered_left {
          padding-top: 60px;
          padding-right: 5px;

          padding-left: 5px;
          display: inline-block;
          border-radius: 25px;
          position: fixed;
          top: 0%;
          left: 20%;

          /* bring your own prefixes */
          transform: translate(-170%, 30%);
        }
        .centered_right {
          padding-top: 50px;
          padding-right: 5px;
          padding-bottom: 50px;
          padding-left: 5px;
          display: inline-block;
          position: fixed;
          top: 0%;
          left: 20%;

          /* bring your own prefixes */
          transform: translate(-200%, 30%);
        }
        .child_centered {
          border-radius: 25px;
          position: relative;
          top: 50%;
          left: 20%;

          /* bring your own prefixes */
          transform: translate(-170%, 30%);
        }
        .padding{
          padding-top: 10px;

        }
        .zoom {
          padding: 50px;

          transition: transform .4s; /* Animation */
          width: 200px;
          height: 200px;
          margin: 0 auto;
        }

        .zoom:hover {
          transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
</head>
<body>
<div class="padding" style="background:transparent">
 <div class="centered_left" style="width:400px;height:550px;background-color:#E1F3FF;left:50%;">
    <div class="login-box" style="margin:0 auto;">
        <div class="login-logo">
            <!-- <a href="https://adinegoro05.wordpress.com/"  target="_blank"><b>Go-BLOG</b> Dev</a> -->
              <img src="/Rioadi/img/logo login page.png" style="height:100%;width:60%">
        </div>
        <!-- /.login-logo -->
        <div class="card" style="border-radius: 25px" >
            <div class="card-body login-card-body" style="background-color:#E1F3FF">
              <p class="login-box-msg">Register a new account</p>

              <form action="{{ route('simpanregistrasi') }}" method="post">
                  {{ csrf_field() }}
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" name="name" placeholder="Full name">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-user"></span>
                          </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                      <input type="email" class="form-control" name="email" placeholder="Email">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                          </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                      <input type="password" class="form-control" name="password" placeholder="Password">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-8">
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">Register</button>
                      </div>
                      <!-- /.col -->
                  </div>
              </form>


              <a href="{{ route('login') }}" class="text-center">I already have an account</a>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
  </div>
  <div class="centered_right" style="width:650px;height:1px;background-color:transparent;left:118%;">

    <img src="Rioadi/img/man.png" style="width:1000px;height:725px;" class="zoom">

 </div>
</div>
    <!-- jQuery -->
    @include('Template.script')

</body>
</html>
