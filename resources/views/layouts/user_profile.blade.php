<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="baseUrl" content="{{ url('/') }}">
    <meta name="csrfToken" content="{{ csrf_token() }}">

    <title>@yield('title') - Maraheb</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body data-anm=".anm">


    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header-->
        @include('user_profile.components.header')
        <!--End Main Header -->

        @yield('content')

        <!-- Main Footer -->
        @include('user_profile.components.footer')
        <!-- End Main Footer -->


    </div><!-- End Page Wrapper -->


    <form action="{{ route('logout') }}" method="POST" id="logout-form">@csrf</form>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/chosen.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
    <script src="{{ asset('js/mmenu.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/anm.min.js') }}"></script>
    <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('js/rellax.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @yield('js')
</body>


<!-- Mirrored from creativelayers.net/themes/superio/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 May 2022 10:22:46 GMT -->
</html>
