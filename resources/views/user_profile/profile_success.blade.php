@extends('layouts.user_profile')

@section('title', 'Personal Information')

@section('content')
<section class="banner-section profile-banner-section" style="min-height: 100vh">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="content-column col-lg-6 col-md-12 col-sm-12 text-center">
                <div class="inner-column wow fadeInUp" data-wow-delay="1000ms">
                    <h3 class="fw-bold text-center mb-3">Thank You</h3>
                    <p>Please Wait. Your profile has been successfully submitted for approval</p>
                    <img src="{{ asset('profile-submission.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
