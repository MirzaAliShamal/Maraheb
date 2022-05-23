@extends('layouts.auth')

@section('title', 'Register')

@section('css')
    <link href="{{ asset('css/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('css/intlTelInput.css') }}" rel="stylesheet">
    <style>
        .iti {
            display: block;
        }
        input[type='tel'] {
            padding-left: 52px !important;
        }
    </style>
@endsection

@section('content')
<div class="login-form default-form">
    <div class="form-inner">
        <h3>Create a Free Maraheb Account</h3>

        <!--Login Form-->
        <form method="post" action="{{ route('register') }}" id="registerForm">
            @csrf
            <input type="hidden" name="role" value="user">
            <div class="row">

                <div class="col-12">
                    <div class="form-group">
                        <div class="btn-box row">
                            <div class="col-lg-6 col-md-12">
                                <a href="javascript:;" class="theme-btn btn-style-four role-chooser active" data-role="user"><i class="la la-user"></i> Candidate </a>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <a href="javascript:;" class="theme-btn btn-style-four role-chooser" data-role="resturant"><i class="la la-briefcase"></i> Resturant Manager </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="@error('first_name') error @enderror" id="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                        <label id="first_name-error" class="error" for="first_name">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="@error('last_name') error @enderror" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                        <label id="last_name-error" class="error" for="last_name">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="@error('email') error @enderror" id="email" value="{{ old('email') }}" placeholder="Email">
                        <label id="email-error" class="error" for="email">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="mobile_no">Mobile No</label>
                        <input type="tel" name="mobile_no" class="@error('mobile_no') error @enderror" value="{{ old('mobile_no') }}" id="mobile_no" placeholder="">
                        <label id="mobile_no-error" class="error" for="mobile_no">
                            @error('mobile_no')
                                {{ $message }}
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="@error('password') error @enderror" id="password" value="" placeholder="Password">
                        <label id="password-error" class="error" for="password">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="@error('password_confirmation') error @enderror" id="password_confirmation" value="" placeholder="Confirm Password">
                        <label id="password_confirmation-error" class="error" for="password_confirmation">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <button class="theme-btn btn-style-one" type="submit" id="submitBtn">Register</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection
