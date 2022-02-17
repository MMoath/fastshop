<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast-shop | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/sweetalert.css')}}" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>FAST</b><sub><em><small>shop</small></em></sub></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            @yield('content')
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/sweetalert.min.js'); }}"></script>

    @include('layouts.massage.sweetalert')
</body>

</html>