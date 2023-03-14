<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('template/img/logo/logo.png')}}" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('template/css/ruang-admin.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-4">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register Masyarakat</h1>
                  </div>
                  <form class="" action="{{route('post.registermasyarakat')}}" method="POST">
                    @csrf
                    @if (Session::get('msg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span class="alert-inner--text"><strong>Warning!</strong> {!! \Session::get('msg') !!}</span>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    @endif
                    <div class="form-group">
                      <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        placeholder="Enter NIK">
                        @error('nik')<div class="invalid-feedback">{{$message}}</div>@enderror   
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="Enter Nama">
                        @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        placeholder="Enter Username">
                        @error('username')<div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control @error('notlp') is-invalid @enderror" name="notlp"
                      placeholder="Enter No Telp">
                      @error('notlp')<div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                  <div class="d-flex">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                      @error('password')<div class="invalid-feedback m-5" >{{$message}}</div>@enderror
                    <div class="input-group-append">
                      <span class="input-group-text" style="background-color: blueviolet" onclick="password_show_hide()">
                        <i class="fas fa-eye" id="show_eye"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                      </span>
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Remember
                        Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>
                  <hr>
                </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="auth/register">Create an Account!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('template/js/ruang-admin.min.js')}}"></script>
  <script>
    function password_show_hide() {
       var x = document.getElementById("password");
       var show_eye = document.getElementById("show_eye");
       var hide_eye = document.getElementById("hide_eye");
       hide_eye.classList.remove("d-none");
       if (x.type === "password") {
           x.type = "text";
           show_eye.style.display = "none";
           hide_eye.style.display = "block";
       } else {
           x.type = "password";
           show_eye.style.display = "block";
           hide_eye.style.display = "none";
       }
       }
    </script>
</body>

</html>