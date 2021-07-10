<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/assets/img/favicon.ico')}}">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/style.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                <div><h2> Login as a Admin  </h2></div>
                    @if(session()->has('msg'))
                    <div class="alert alert-danger">
                        {{session()->get('msg')}}
                        {{session()->put('msg',NULL)}}
                        </div>
                        @endif
                    <form method="POST" action="" class="form-signin">
                        @csrf
						<div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" autofocus="" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password"class="form-control" required="">
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="{{route ('register')}}">Register Now</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="{{asset('dashboard/assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('dashboard/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/app.js')}}"></script>
</body>
</html>
