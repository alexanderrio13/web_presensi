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
    <style>
        body {
          background-image: url('/Rioadi/img/manbg.jpg');
          background-attachment: fixed;
          background-size: cover;
        }
        .centered {
          border-radius: 25px;
          position: relative;
          top: 50%;
          left: 20%;

          /* bring your own prefixes */
          transform: translate(-170%, 30%);
        }
        .child_centered {
          border-radius: 25px;
          position: relative;
          top: 50%;
          left: 20%;

          /* bring your own prefixes */
          transform: translate(-170%, 30%);
        }
    </style>
</head>
<body>
 <div class="centered" style="width:400px;height:550px;background-color:#EEFCFC;top:50%;left:50%;">
    <div class="login-box" style="margin:0 auto;">
        <div class="login-logo">
            <!-- <a href="https://adinegoro05.wordpress.com/"  target="_blank"><b>Go-BLOG</b> Dev</a> -->
              <img src="/Rioadi/img/logo login page.png" style="height:100%;width:60%">
        </div>
        <!-- /.login-logo -->
        <div class="card" style="border-radius: 25px" >
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('postlogin') }}" method="post">
                    {{ csrf_field() }}
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
                    @if ($error = $errors->first('password'))
                      <div class="alert alert-danger">
                        {{ $error }}
                      </div>
                    @endif
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            <input type="button" class="btn btn-default btn-block" onclick="location.href='{{route('registrasi')}}';" value="Register" />
                                <!-- <button type="submit" class="btn btn-default btn-block">Register</button> -->

                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
  </div>
    <!-- jQuery -->
    @include('Template.script')

</body>
</html>
