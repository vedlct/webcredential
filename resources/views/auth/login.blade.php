<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web Credential</title>
</head>

<body class="fixed-left">


                                    <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('password') }}</strong>
															</span>
                                                    @endif
                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
                                        <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-sm-7 m-t-20"><a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a></div>
                                            <div class="col-sm-5 m-t-20"><a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a></div>
                                        </div>
                                    </form>

</body>

</html>