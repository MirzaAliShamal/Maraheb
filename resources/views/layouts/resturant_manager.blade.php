<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="baseUrl" content="{{ url('/') }}">
    <meta name="csrfToken" content="{{ csrf_token() }}">
    <title>@yield('title') - Maraheb</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
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
<body>

    <div class="page-wrapper dashboard">

        <!-- Header Span -->
        <span class="header-span"></span>

        <!-- Main Header-->
        @include('resturant_manager.components.header')
        <!--End Main Header -->

        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop"></div>

        <!-- User Sidebar -->
        @include('resturant_manager.components.sidebar')
        <!-- End User Sidebar -->

        @yield('content')

        <form action="{{ route('resturant.manager.logout') }}" method="POST" id="logout-form">@csrf</form>

        <!-- Copyright -->
        <div class="copyright-text">
            <p>© 2022 Maraheb. All Right Reserved.</p>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/chosen.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
    <script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
    <script src="{{ asset('js/mmenu.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/anm.min.js') }}"></script>
    <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('js/rellax.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('js/chart.min.js') }}"></script>
</body>
