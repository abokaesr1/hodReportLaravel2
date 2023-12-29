<!doctype html>
<html lang="en">

<head>
<title>HOD REPORTS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/charts-c3/plugin.css') }}"/>
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/parsleyjs/css/parsley.css') }}">

@yield('style')
<style>
    .dropdown-menu{
        min-width: 400px;
    }
    .btn-group .btn{
        min-width: 400px;
        text-align: left

    }
</style>
<!-- MAIN Project CSS file -->
<link rel="stylesheet" href="{{ asset('Front_end/assets/css/main.css') }}">
</head>
<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">
        @include('Front_End.layout.preload')
        @include('Front_End.layout.header')
        @include('Front_End.layout.left_sidebar')
        @yield('content')
    </div>

<!-- Javascript -->
<script src="{{ asset('Front_end/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('Front_end/assets/bundles/vendorscripts.bundle.js') }}"></script>

<!-- page vendor js file -->
<script src="{{ asset('Front_end/assets/vendor/toastr/toastr.js') }}"></script>
<script src="{{ asset('Front_end/assets/bundles/c3.bundle.js') }}"></script>

<!-- page vendor js file -->
<script src="{{ asset('Front_end/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('Front_end/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>


<!-- page js file -->
<script src="{{ asset('Front_end/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('Front_end/js/index.js') }}"></script>

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
@yield('js')
</body>
</html>
