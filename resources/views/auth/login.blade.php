@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="login-form default-form">
    <div class="form-inner">
        <h3>Login to Superio</h3>
        <!--Login Form-->
        <form method="post" action="{{ route('login') }}" id="loginForm">
            @csrf
            <input type="hidden" name="role" value="user">

            <div class="form-group">
                <div class="btn-box row">
                    <div class="col-lg-4 col-md-12">
                        <a href="javascript:;" class="theme-btn btn-style-four px-0 role-chooser active" data-role="user"><i class="la la-user"></i> Candidate </a>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <a href="javascript:;" class="theme-btn btn-style-four px-0 role-chooser" data-role="resturant"><i class="la la-briefcase"></i> Resturant Manager </a>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <a href="javascript:;" class="theme-btn btn-style-four px-0 role-chooser" data-role="purchase"><i class="la la-briefcase"></i> Purchase Manager </a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="@error('email') error @enderror" id="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off">
                <label id="email-error" class="error" for="email">
                    @error('email')
                        {{ $message }}
                    @enderror
                </label>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="@error('password') error @enderror" id="password" value="" placeholder="Password" autocomplete="off">
                <label id="password-error" class="error" for="password">
                    @error('password')
                        {{ $message }}
                    @enderror
                </label>
            </div>

            <div class="form-group">
                <div class="field-outer">
                <div class="input-group checkboxes square">
                    <input type="checkbox" name="remember" value="" id="remember">
                    <label for="remember" class="remember"><span class="custom-checkbox"></span> Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" class="pwd">Forgot password?</a>
                </div>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit" id="submitBtn">Log In</button>
            </div>
        </form>

        <div class="bottom-box">
            <div class="text">Don't have an account? <a href="{{ route('register') }}">Signup</a></div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/login.js') }}"></script>
@endsection

