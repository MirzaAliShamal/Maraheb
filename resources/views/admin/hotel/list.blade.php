@extends('layouts.admin')

@section('title', 'Hotels')
@section('page-heading', 'Hotels')

@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-dark">Hotels</li>
    <!--end::Item-->
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pt-6 mb-5">
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative">
                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" id="search" data-kt-customer-table-filter="search"
                    class="form-control form-control-solid w-250px ps-15" placeholder="Search Hotels"
                    autocomplete="off">
            </div>
            <!--end::Search-->
        </div>
        <div class="justify-content-end">
            <a href="{{ route('admin.hotel.add') }}" class="btn btn-primary add-item" data-bs-toggle="tooltip" title=""
                data-bs-original-title="Add Hotel">
                <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                        <rect fill="#000000" opacity="0.5"
                            transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                            x="4" y="11" width="16" height="2" rx="1"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                Add Hotel
            </a>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="server-datatables table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Hotel Name</th>
                        <th>Status (Disable/Active)</th>
                        <th class="text-end pe-2">Action</th>
                    </tr>
                </thead>
                <tbody class="fw-bold">

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/hotel/list.js') }}"></script>
@endsection
