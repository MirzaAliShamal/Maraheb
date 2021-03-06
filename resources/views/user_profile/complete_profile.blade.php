@extends('layouts.user_profile')

@section('title', 'Personal Information')

@section('content')
<section class="banner-section profile-banner-section" style="min-height: 100vh">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="content-column col-lg-10 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInUp" data-wow-delay="1000ms">
                    <h2 class="fw-bold text-center mb-5">Complete your Profile</h2>
                    @if ($user->profile_status == 'rejected')
                        <div class="message-box error">
                            <p>Error: Your profile has been rejected, Please try again!</p>
                            <button class="close-btn"><span class="close_icon"></span></button>
                        </div>
                    @endif
                    <form action="{{ route('user.profile.save') }}" method="POST" enctype="multipart/form-data" class="default-form" id="applicationForm" data-id="{{ $user->id }}">
                        @csrf
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-content py-4">
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="upload_avatar">Avatar *</label>
                                            <div class="dropzone" id="upload_avatar">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <!--begin::Icon-->
                                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                    <!--end::Icon-->

                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop image here or click to
                                                            upload.</h3>
                                                        <span class="fs-7 fw-bold text-gray-400">Upload only 1 image at a
                                                            time</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <input type="hidden" name="upload_avatar" class="upload_avatar" value="">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="first_name">First Name *</label>
                                            <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" onkeyup="validateBtn()" placeholder="John" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="last_name">Last Name *</label>
                                            <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" onkeyup="validateBtn()" placeholder="Doe" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="dob">Date of birth *</label>
                                            <input type="text" id="dob" name="dob" class="datepicker" value="{{ $user->dob }}" placeholder="mm/dd/yyyy" onchange="validateBtn()" autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="gender">Gender *</label>
                                            <select name="gender" id="gender" onchange="validateBtn()" class="chosen-select">
                                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="address">Address *</label>
                                            <input type="text" id="address" name="address" value="{{ $user->address }}" onkeyup="validateBtn()" placeholder="Your address here" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="country">Country *</label>
                                            <select name="country" id="country" onchange="validateBtn()" class="chosen-search-select">
                                                @foreach (countries() as $item)
                                                    <option value="{{ $item->name }}" {{ $user->country == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="city">City *</label>
                                            <input type="text" id="city" name="city" value="{{ $user->city }}" onkeyup="validateBtn()" placeholder="City" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="experience">Experience <small>(In years)</small> *</label>
                                            <div class="range-slider-one experience-range">
                                                <div class="experience-range-slider"></div>
                                                <div class="input-outer">
                                                    <div class="amount-outer">
                                                        <span class="amount experience-amount">
                                                            <span class="min">{{ $user->experience_min }}</span> years -
                                                            <span class="max">{{ $user->experience_max }}</span> years
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="experience_min" value="{{ $user->experience_min }}">
                                            <input type="hidden" name="experience_max" value="{{ $user->experience_max }}">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="experience">Specialise in *</label>
                                            <select data-placeholder="Choose a field..." name="specialisation[]" onchange="validateBtn()" class="chosen-select" multiple tabindex="4">
                                                @foreach (specialisations() as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $user->userSpecialisations()->count() > 0 ? in_array($item->id, $user->userSpecialisations->pluck('specialisation_id')->toArray()) ? 'selected' : '' : '' }}
                                                    >
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="intro_video">Intro Video *</label>
                                            <div class="dropzone" id="intro_video">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <!--begin::Icon-->
                                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                    <!--end::Icon-->

                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop video here or click to
                                                            upload.</h3>
                                                        <span class="fs-7 fw-bold text-gray-400">Upload only 1 video at a
                                                            time</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <input type="hidden" name="intro_video" class="intro_video" value="">
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="upload_cv">Upload CV *</label>
                                            <div class="dropzone" id="upload_cv">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <!--begin::Icon-->
                                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                    <!--end::Icon-->

                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop .docs/.pdf here or click to
                                                            upload.</h3>
                                                        <span class="fs-7 fw-bold text-gray-400">Upload only 1 file at a
                                                            time</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <input type="hidden" name="upload_cv" class="upload_cv" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <button type="submit" class="theme-btn btn-style-one large" id="submitBtn" disabled>Submit Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/user_profile.js?v=1.20') }}"></script>
@endsection
