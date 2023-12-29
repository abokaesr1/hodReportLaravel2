<!doctype html>
<html lang="en">

<head>
<title>9Yards TRACKER LOGIN</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/toastr/toastr.min.css') }}">


<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('Front_end/assets/css/main.css') }}">
<style>
    .lead,
    .submit{
        font-weight: bold;
    }
</style>
</head>

<body data-theme="light" class="font-nunito">
	<!-- WRAPPER -->
	<div id="wrapper" class="theme-cyan">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">

					<div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="post" action="{{ route('loginpost') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control"
                                    id="email" name="email"
                                    placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password"
                                    class="form-control" id="password" placeholder="Password">
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block submit">LOGIN</button>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{ asset('Front_end/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('Front_end/assets/bundles/vendorscripts.bundle.js') }}"></script>

<!-- page vendor js file -->
<script src="{{ asset('Front_end/assets/vendor/toastr/toastr.js') }}"></script>
<script src="{{ asset('Front_end/assets/bundles/c3.bundle.js') }}"></script>

@if(session()->has('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var message = '{{ session("success") }}'; // Retrieve the success message from the session
        var context = 'success';
        var positionClass = 'toast-top-right';

        toastr.remove();
        toastr[context](message, '', {
            positionClass: positionClass
        });
    });
</script>
@endif
@if(session()->has('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var message = '{{ session("error") }}'; // Retrieve the error message from the session
        var context = 'error';
        var positionClass = 'toast-top-right';

        toastr.remove();
        toastr[context](message, '', {
            positionClass: positionClass
        });
    });
</script>
@endif
</body>
</html>
