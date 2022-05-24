@extends('layouts.admin_auth')

@section('title', 'Login')

@section('content')

<form class="form w-100" method="POST" id="kt_sign_in_form" action="{{ route('admin.login.store') }}">
    @csrf
    <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-dark mb-3">Sign In to Maraheb (Admin)</h1>
        <!--end::Title-->
    </div>
    <!--begin::Heading-->
    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Label-->
        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="off" />
        @error('email')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!--end::Input-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack mb-2">
            <!--begin::Label-->
            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
            <!--end::Label-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Input-->
        <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" />
        @error('password')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!--end::Input-->
    </div>
    <!--end::Input group-->

    <!--begin::Actions-->
    <div class="text-center">
        <!--begin::Submit button-->
        <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
            <span class="indicator-label">Continue</span>
        </button>
        <!--end::Submit button-->
    </div>
    <!--end::Actions-->
</form>
@endsection

@section('js')
    <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
@endsection
