@extends('layouts.resturant_manager_profile')

@section('title', 'Personal Information')

@section('content')
<section class="banner-section profile-banner-section" style="min-height: 100vh">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="content-column col-lg-10 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInUp" data-wow-delay="1000ms">
                    <h2 class="fw-bold text-center mb-5">Complete your Profile</h2>
                    @if ($resturant_manager->profile_status == 'rejected')
                        <div class="message-box error">
                            <p>Error: Your profile has been rejected, Please try again!</p>
                            <button class="close-btn"><span class="close_icon"></span></button>
                        </div>
                    @endif
                    <form action="{{ route('resturant.manager.profile.save') }}" method="POST" enctype="multipart/form-data" class="default-form" id="applicationForm" data-id="{{ $resturant_manager->id }}">
                        @csrf
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-content py-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="fw-bold mb-3">Personal Details</h5>
                                        </div>
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
                                            <input type="text" id="first_name" name="first_name" value="{{ $resturant_manager->first_name }}" onkeyup="validateBtn()" placeholder="John" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="last_name">Last Name *</label>
                                            <input type="text" id="last_name" name="last_name" value="{{ $resturant_manager->last_name }}" onkeyup="validateBtn()" placeholder="Doe" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="dob">Date of birth *</label>
                                            <input type="text" id="dob" name="dob" class="datepicker" value="" placeholder="mm/dd/yyyy" onchange="validateBtn()" autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="gender">Gender *</label>
                                            <select name="gender" id="gender" onchange="validateBtn()" class="chosen-select">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="address">Address *</label>
                                            <input type="text" id="address" name="address" value="" onkeyup="validateBtn()" placeholder="Your address here" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="country">Country *</label>
                                            <select name="country" id="country" onchange="validateBtn()" class="chosen-search-select">
                                                @foreach (countries() as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="city">City *</label>
                                            <input type="text" id="city" name="city" value="" onkeyup="validateBtn()" placeholder="City" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="zip_code">Zip/Postal Code *</label>
                                            <input type="text" id="zip_code" name="zip_code" value="" onkeyup="validateBtn()" placeholder="12345" autocomplete="off">
                                        </div>
                                        <div class="col-12">
                                            <h5 class="fw-bold mb-3">Resturant Details</h5>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="resturant_logo">Resturant Logo *</label>
                                            <div class="dropzone" id="resturant_logo">
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
                                            <input type="hidden" name="resturant_logo" class="resturant_logo" value="">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="hotel_id">Select Hotel *</label>
                                            <select name="hotel_id" id="hotel_id" onchange="validateBtn()" class="chosen-search-select">
                                                <option value="" disabled selected>Select Hotel</option>
                                                @foreach (hotels() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="resturant_name">Resturant Name *</label>
                                            <input type="text" id="resturant_name" name="resturant_name" value="" onkeyup="validateBtn()" placeholder="KFC" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="resturant_trade_license">Resturant Trade License *</label>
                                            <input type="text" id="resturant_trade_license" name="resturant_trade_license" value="" onkeyup="validateBtn()" placeholder="123456" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="resturant_address">Resturant Address *</label>
                                            <input type="text" id="resturant_address" name="resturant_address" value="" onkeyup="validateBtn()" placeholder="" autocomplete="off">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="no_of_dept">No. of Departments *</label>
                                            <input type="text" id="no_of_dept" name="no_of_dept" value="0" onkeyup="validateBtn()" placeholder="0" autocomplete="off" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="resturant_depts">Select Departments *</label>

                                            <div class="checkbox-outer">
                                                <ul class="row checkboxes square">
                                                    @foreach (departments() as $item)
                                                        <li class="col-lg-6 col-md-6 col-sm-12 col-12 mx-0">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <input id="check-{{ $loop->iteration }}" type="checkbox" name="resturant_depts[{{ $loop->iteration }}]" value="{{ $item->id }}" class="resturant-depts">
                                                                    <label for="check-{{ $loop->iteration }}">{{ $item->name }}</label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="hourly-rate position-relative" style="display: none;">
                                                                        <span class="currency-prefix">$</span>
                                                                        <input type="text" name="hourly_rate[{{ $loop->iteration }}]" id="hourly-{{ $loop->iteration }}" class="hourly-rate-input" placeholder="Hourly Rate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
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
    <script src="{{ asset('js/resturant_manager_profile.js') }}"></script>
@endsection
