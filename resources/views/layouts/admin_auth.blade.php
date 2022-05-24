<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>@yield('title') - Admin Maraheb</title>
        <meta name="baseUrl" content="{{ url('/') }}">
        <meta name="csrfToken" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-center position-x-center bgi-no-repeat bgi-size-cover" style="background-image: url({{ asset('assets/media/illustrations/login-bg.jpg') }});">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        <!--begin::Logo-->
                        <div class="text-center mb-10">
                            <a href="{{ route('home') }}" class="">
                                <img alt="Logo" src="{{ asset('images/logo.png') }}" width="60px" />
                            </a>
                        </div>
                        <!--end::Logo-->
                        @yield('content')
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

        @yield('js')
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
