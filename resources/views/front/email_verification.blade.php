@extends('layouts.front')

@section('title', 'Verify Email')

@section('content')
<section class="banner-section profile-banner-section" style="min-height: 100vh">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="content-column col-lg-6 col-md-12 col-sm-12 text-center">
                <div class="inner-column wow fadeInUp" data-wow-delay="1000ms">


                    <!-- Job Search Form -->
                    <div class="job-search-form p-5">
                        <div class="title-box">
                            <h2 class="fw-bold">Please verify your Email</h2>
                            <div class="text">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</div>
                        </div>

                        <img src="{{ asset('email-verify.png') }}" class="img-fluid" alt="">
                    </div>
                    <!-- Job Search Form -->

                    <!-- Popular Search -->
                    <div class="text-center">
                        <a href="{{ route('resend.email.verify') }}">Didn't get the email?</a>
                    </div>
                    <!-- End Popular Search -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
