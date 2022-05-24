@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-heading', 'Dashboard')

@section('content')
<div class="row g-5 g-xl-8 mb-xl-8">
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="card bg-danger hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-dark fw-bolder fs-2 mb-2 mt-5">0</div>
                <div class="fw-bold text-inverse-dark fs-7">Total Users</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="card bg-primary hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-dark fw-bolder fs-2 mb-2 mt-5">0</div>
                <div class="fw-bold text-inverse-dark fs-7">Total Users's balance</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="card bg-success hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-dark fw-bolder fs-2 mb-2 mt-5">0</div>
                <div class="fw-bold text-inverse-dark fs-7">Total Other Orders</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg-->
                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"></rect>
                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"></rect>
                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path>
                            <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"></rect>
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-body fw-bolder fs-2 mb-2 mt-5">0</div>
                <div class="fw-bold text-inverse-body fs-7">Total Views Orders</div>
            </div>
        </div>
    </div>
</div>
@endsection
