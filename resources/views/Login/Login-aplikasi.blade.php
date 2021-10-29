<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Go-Blog | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

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
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>

        body {background: linear-gradient(127deg, #0E9AA9, #E1F3FF,#E1F3FF);
    background-size: 400% 400%;
    border-radius: 5px;


    -webkit-animation: AnimationName 30s ease infinite;
    -moz-animation: AnimationName 30s ease infinite;
    animation: AnimationName 25s ease infinite;
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
        .main {
          background:transparent;
          width:100%;
          height:100%;
          position:fixed;
          display:inline-block;
          margin-right:50px;
          font-family: Poppins;
          font-size:0.9em;

        }

        .div_box {
          width:450px;
          height:600px;
          background-color:#E1F3FF;
          border:1px solid;
          border-width:2px;
          border-color:#0E9AA9;
          border-radius: 40px;
=         position: fixed;
          padding-top:12.5%;
          margin: auto;

        }

        .div_left {
          width:37.5%;
          height:100%;
          background-color:transparent;
          float:left;

          /* padding-left: 4%;*/
          padding-top: 9%;

        }
        .div_right {
          width:62.5%;
          height:90%;
          background-color:transparent;
          float:right;
          margin:auto;

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
          transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }

        @media screen and (max-width: 1024px) {
          .div_right {
            display:none;

          }
          .main {
            background:transparent;
            width:400px;
            padding-top:75px;
            padding-left:10px;


          }

          .div_box {
            width:390px;
            height:540px;
            margin:0 auto;

          }
        }
        .border1 {
          border-top-left-radius: 15px;
          border-bottom-left-radius: 15px;
        }

    </style>
</head>
<body>
<div class="main">
<div class="div_left">
 <div class="div_box">
    <div class="login-box" style="margin:0 auto;">
        <div class="login-logo">
            <!-- <a href="https://adinegoro05.wordpress.com/"  target="_blank"><b>Go-BLOG</b> Dev</a> -->
              <img src="/Rioadi/img/logo-login-page.png" style="height:65%;width:65%">
        </div>
        <!-- /.login-logo -->
        <div class="" style="border-radius: 25px" >
            <div class="card-body login-card-body" style="background-color:#E1F3FF;">
              @if ($error = $errors->first('password'))
              <div class="alert alert-danger alert-dismissible show" style="background: rgba(187,33,36, 0.7); font-size:0.9em;">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  {{ $error }}
              </div>
              @endif
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('postlogin') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="email" class="form-control border1" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text" style="border-top-right-radius: 25px;border-bottom-right-radius:25px">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control border1" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text" style="border-top-right-radius: 25px;border-bottom-right-radius:25px">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div  style="float:right">
                              <a style="font-family:Poppins;font-size:0.95em;color:gray" href="{{route('forgot-password')}}"><strong>Forgot password?</strong></a>
                            </div>
                            <div style="float:left">
                              <input type="checkbox" name="remember_token" > <a style="color:gray"><strong>Remember me</strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" style="margin:auto;margin-top:20px">
                        <button type="submit" class="btn btn-primary btn-block" style="width:125%">Sign In</button>
                        <!-- <input type="button" class="btn btn-default btn-block" onclick="location.href='{{route('registrasi')}}';" value="Register" /> -->
                            <!-- <button type="submit" class="btn btn-default btn-block">Register</button> -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
  </div>
</div>
  <div class="div_right">

    <img src="Rioadi/img/man.png" style="width:110%;height:110%;" class="zoom">

 </div>
</div>
    <!-- jQuery -->
    @include('Template.script')

</body>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
