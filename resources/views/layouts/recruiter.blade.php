<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="baseUrl" content="{{ url('/') }}">
    <meta name="csrfToken" content="{{ csrf_token() }}">
    <title>@yield('title') - Maraheb</title>

    <!-- Stylesheets -->
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('css/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('css/intlTelInput.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        .iti {
            display: block;
        }
        input[type='tel'] {
            padding-left: 52px !important;
        }
        #toast-container > .toast-success {
            opacity: 1 !important;
        }
        #toast-container > .toast-error {
            opacity: 1 !important;
        }
    </style>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

    @yield('css')
</head>
<body>

    <div class="page-wrapper dashboard">

        <!-- Header Span -->
        <span class="header-span"></span>

        <!-- Main Header-->
        @include('recruiter.components.header')
        <!--End Main Header -->

        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop"></div>

        <!-- User Sidebar -->
        @include('recruiter.components.sidebar')
        <!-- End User Sidebar -->

        @yield('content')

        <form action="{{ route('recruiter.logout') }}" method="POST" id="logout-form">@csrf</form>

        <!-- Copyright -->
        <div class="copyright-text">
            <p>© 2022 Maraheb. All Right Reserved.</p>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/chosen.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.modal.min.js') }}"></script> --}}
    <script src="{{ asset('js/prism.js') }}"></script>
    <script src="{{ asset('js/intlTelInput.js') }}"></script>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('js/chart.min.js') }}"></script>

    @if (Session::has('success'))
        <script>
            toastr.success("{{ session('success') }}", 'Maraheb Says')
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ session('error') }}", 'Maraheb Says')
        </script>
    @endif

    @yield('js')
</body>
