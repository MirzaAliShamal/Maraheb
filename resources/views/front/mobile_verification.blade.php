@extends('layouts.front')

@section('title', 'Verify Mobile')

@section('content')
<section class="banner-section" style="min-height: 100vh">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="content-column col-lg-6 col-md-12 col-sm-12 text-center">
                <div class="inner-column wow fadeInUp" data-wow-delay="1000ms">


                    <!-- Job Search Form -->
                    <div class="job-search-form p-5">
                        <div class="title-box">
                            <h2 class="fw-bold">Please enter the <span class="colored">OTP</span> to verify <br> your mobile number</h2>
                            <div class="text">A code has be sent to {{ hidePhone("+923069387974") }}</div>
                        </div>

                        <div class="c-otp">
                            <div id="otp-inputs" class="c-otp__group">
                                <input class="c-otp__input" type="text" placeholder="" pattern="\d*" inputmode="numeric" autocomplete="off">
                                <input class="c-otp__input" type="text" placeholder="" pattern="\d*" inputmode="numeric" autocomplete="off">
                                <input class="c-otp__input" type="text" placeholder="" pattern="\d*" inputmode="numeric" autocomplete="off">
                                <input class="c-otp__input" type="text" placeholder="" pattern="\d*" inputmode="numeric" autocomplete="off">
                                <input class="c-otp__input" type="text" placeholder="" pattern="\d*" inputmode="numeric" autocomplete="off">
                                <input class="c-otp__input" type="text" placeholder="" pattern="\d*" inputmode="numeric" autocomplete="off">
                            </div>
                        </div>

                        <input type="hidden" name="otp" value="">
                        <label id="otp-error" class="error text-danger"></label>

                        <div class="text-center mt-3">
                            <button class="theme-btn btn-style-one" type="button" id="verifyBtn">Verify</button>
                        </div>
                    </div>
                    <!-- Job Search Form -->

                    <!-- Popular Search -->
                    <div class="text-center">
                        <a href="">Didn't get the code?</a>
                    </div>
                    <!-- End Popular Search -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/mobile-verify.js') }}"></script>
@endsection
