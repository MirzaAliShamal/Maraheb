@extends('layouts.admin')

@section('title', 'Resturant Manager Profile')
@section('page-heading', 'Resturant Manager Profile')

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
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.resturant.manager.profile', $resturant_manager->id) }}" class="text-muted text-hover-primary">Resturant Manager Profile</a>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-dark">Edit Profile</li>
    <!--end::Item-->
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body py-10">
                <form action="{{ route('admin.resturant.manager.save', $resturant_manager->id) }}" method="POST" enctype="multipart/form-data" id="editProfile">
                    @csrf
                    <div class="row">
                        <div class="col-12" id="personal">
                            <h3 class="mb-10">Personal Details</h3>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Avatar</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" name="avatar" class="dropify @error('avatar') is-invalid @enderror" data-default-file="{{ Storage::disk('public')->url($resturant_manager->avatar) }}">
                                @error('avatar')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">First Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="first_name" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('first_name') is-invalid @enderror" value="{{ $resturant_manager->first_name }}" autocomplete="off">
                                @error('first_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Last Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="last_name" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('last_name') is-invalid @enderror" value="{{ $resturant_manager->last_name }}" autocomplete="off">
                                @error('last_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Date of birth</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="dob" id="dob" onchange="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('dob') is-invalid @enderror" value="{{ $resturant_manager->dob }}" autocomplete="off">
                                @error('dob')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Gender</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid @error('gender') is-invalid @enderror" onchange="validateBtn()" name="gender" id="gender">
                                    <option value="male" {{ $resturant_manager->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $resturant_manager->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $resturant_manager->gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Address</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="address" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('address') is-invalid @enderror" value="{{ $resturant_manager->address }}" autocomplete="off">
                                @error('address')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Country</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid @error('country') is-invalid @enderror" onchange="validateBtn()" name="country" id="country" data-control="select2" data-placeholder="Select a country">
                                    @foreach (countries() as $item)
                                        <option value="{{ $item->name }}" {{ $resturant_manager->country == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">City</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="city" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('city') is-invalid @enderror" value="{{ $resturant_manager->city }}" autocomplete="off">
                                @error('city')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Zip/Postal Code</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" onkeyup="validateBtn()" name="zip_code" class="form-control form-control-solid mb-3 mb-lg-0 @error('zip_code') is-invalid @enderror" value="{{ $resturant_manager->zip_code }}" autocomplete="off">
                                @error('zip_code')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-12" id="resturant">
                            <h3 class="mb-10 mt-5">Resturant Details</h3>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Resturant Logo</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" name="resturant_logo" class="dropify @error('resturant_logo') is-invalid @enderror" data-default-file="{{ Storage::disk('public')->url($resturant_manager->resturant->logo) }}">
                                @error('resturant_logo')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Hotel</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid @error('hotel_id') is-invalid @enderror" onchange="validateBtn()" name="hotel_id" data-control="select2" data-placeholder="Select a Hotel">
                                    @foreach (hotels() as $item)
                                        <option value="{{ $item->id }}" {{ $resturant_manager->resturant->hotel_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('hotel_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Resturant Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="resturant_name" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('resturant_name') is-invalid @enderror" value="{{ $resturant_manager->resturant->name }}" autocomplete="off">
                                @error('resturant_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Resturant Trade License</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="resturant_trade_license" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('resturant_trade_license') is-invalid @enderror" value="{{ $resturant_manager->resturant->trade_license }}" autocomplete="off">
                                @error('resturant_trade_license')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Resturant Address</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="resturant_address" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('resturant_address') is-invalid @enderror" value="{{ $resturant_manager->resturant->address }}" autocomplete="off">
                                @error('resturant_address')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">No of Departments</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="no_of_dept" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('no_of_dept') is-invalid @enderror" value="{{ $resturant_manager->resturant->no_of_dept }}" autocomplete="off">
                                @error('no_of_dept')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Departments</label>
                                <!--end::Label-->
                                <div class="row">
                                    @foreach (departments() as $item)
                                        <div class="col-lg-6 mb-5">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input resturant-depts"
                                                            type="checkbox" value="{{ $item->id }}" id="check-{{ $loop->iteration }}"
                                                            name="resturant_depts[{{ $loop->iteration }}]"
                                                            {{ checkResturantDepts($resturant_manager->resturant->id, $item->id) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="check-{{ $loop->iteration }}">
                                                            {{ $item->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="hourly-rate position-relative" style="{{ checkResturantDepts($resturant_manager->resturant->id, $item->id) ? '' : 'display:none;' }}">
                                                        <span class="currency-prefix">$</span>
                                                        <input type="text" name="hourly_rate[{{ $loop->iteration }}]"
                                                            id="hourly-{{ $loop->iteration }}" class="form-control form-control-solid hourly-rate-input"
                                                            value="{{ checkResturantDeptHourly($resturant_manager->resturant->id, $item->id) }}"
                                                            placeholder="Hourly Rate" autocomplete="off"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7">
                                <button type="submit" class="btn btn-primary mt-5" id="editProfileBtn">
                                    <span class="indicator-label">
                                        Save Changes
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/resturant_manager/edit.js') }}"></script>
@endsection
