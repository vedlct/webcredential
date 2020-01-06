<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web Credential</title>

    <link rel="icon" type="image/png" href="{{url('public')}}/assets/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{url('public')}}/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{url('public')}}/assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{url('public')}}/assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{url('public')}}/assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{url('public')}}/assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/assets/login/css/main.css">


</head>

<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form class="login100-form validate-form" action="{{ route('welcome') }}" method="post">
                @csrf
                <span class="login100-form-title p-b-33">
						Web Credentials
					</span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                           name="email" value="{{ old('email') }}" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif




                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>


                </div>



                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="pass" placeholder="Password">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn" type="submit">
                        Sign in
                    </button>
                </div>

                <div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

                    <a href="#" class="txt2 hov1">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

                    <a href="#" class="txt2 hov1">
                        Sign up
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{url('public')}}/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('public')}}/assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('public')}}/assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="{{url('public')}}/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('public')}}/assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('public')}}/assets/login/vendor/daterangepicker/moment.min.js"></script>
<script src="{{url('public')}}/assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="{{url('public')}}/assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="{{url('public')}}/assets/login/js/main.js"></script>

</body>

</html>
