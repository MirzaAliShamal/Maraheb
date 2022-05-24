<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
        <meta name="admin" content="{{ admin()->id }}">
        <meta name="baseUrl" content="{{ url('/') }}">
        <meta name="csrfToken" content="{{ csrf_token() }}">
        <meta name="role" content="admin">
		<title>@yield('title') - Admin Maraheb</title>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">

        <style>
            #toast-container > .toast-success {
                opacity: 1 !important;
            }
            #toast-container > .toast-error {
                opacity: 1 !important;
            }
            .read-status {
                position: absolute;
                top: 5px;
                right: 25px;
                cursor: pointer;
                background-color: #ffffff;
                border-radius: 3px;
                padding: 0rem 0.2rem;
                display: none;
            }
            .read-status img {
                width: 16px
            }
            .bg-secondary .read-status {
                display: inline-block;
            }
            .bg-primary.hoverable:hover {
                background-color: #0095e8!important;
            }
        </style>
        @yield('css')
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
        <div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
                @include('admin.components.side')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					@include('admin.components.nav')
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('page-heading')</h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
								@yield('content')
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--end::Main-->



        <form action="{{ route('admin.logout') }}" method="post" id="logout-form">@csrf</form>

		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->

		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
        <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/admin.js') }}"></script>

        @if (Session::has('success'))
            <script>
                Toast.fire({
                    icon: 'success',
                    title: '{{ session("success") }}'
                })
            </script>
        @endif

        @if (Session::has('error'))
            <script>
                Toast.fire({
                    icon: 'error',
                    title: '{{ session("error") }}'
                })
            </script>
        @endif

        @yield('js')
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
