<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('static/back_end/images/favicon.png') }}">
    <title>{{ app_config('AppTitle') }}</title>
    <!-- Custom CSS -->
    <link href="{{ asset('static/back_end/dist/css/style.min.css') }}" rel="stylesheet">
   
   
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url( {{asset('static/back_end/images/big/auth-bg.jpg') }}) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="{{ asset('upload/images/logo/'.app_config('AppLogo'))}}" alt="logo" width="100"></span>
                        <h5 class="font-medium m-b-20">Sign In to {{ app_config('AppName') }} Admin</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                        <?php if(Session::has('message')): ?>
                          <div class="alert alert-success">{{ Session::get('message') }}.</div>
                          <?php endif; ?>

                          @if (count($errors) > 0)
                          @foreach ($errors->all() as $error)   
                        <div class="alert alert-danger">{{ $error }}</div>
                          @endforeach
                          @endif
                <form class="form-horizontal m-t-20" id="loginform" role="form" method="POST" action="{{ url('admin/login/check') }}">
                               @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                         <input type="email" name= "email" class="form-control form-control-lg" placeholder="Email" aria-label="Username" value="{{ old('email') }}" aria-describedby="basic-addon1" required>
                                </div>
                                   @if ($errors->has('email'))
                                    <span class="help-block">
                                         <font color="red"><strong>{{ $errors->first('email') }}</strong></font>
                                    </span>
                                     <br>
                                      <br>
                                @endif
                               


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>


                              
                                </div>
                                  @if ($errors->has('password'))
                                    <span class="help-block">
                                        <font color="red"><strong>{{ $errors->first('password') }}</strong></font>
                                    </span>
                                     <br>
                                      <br>
                                @endif

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                            <a href="{{ route('password.reset') }}" id="to-recover" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
	 
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('static/back_end/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('static/back_end/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('static/back_end/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>

</html>