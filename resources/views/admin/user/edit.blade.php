@extends('layouts.admin')

@section('title', 'User Profile')
@section('page-heading', 'User Profile')

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
        <a href="{{ route('admin.user.profile', $user->id) }}" class="text-muted text-hover-primary">User Profile</a>
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
                <form action="{{ route('admin.user.save', $user->id) }}" method="POST" enctype="multipart/form-data" id="editProfile">
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
                                <input type="file" name="avatar" class="dropify @error('avatar') is-invalid @enderror" data-default-file="{{ Storage::disk('public')->url($user->avatar) }}">
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
                                <input type="text" name="first_name" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('first_name') is-invalid @enderror" value="{{ $user->first_name }}" autocomplete="off">
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
                                <input type="text" name="last_name" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('last_name') is-invalid @enderror" value="{{ $user->last_name }}" autocomplete="off">
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
                                <input type="text" name="dob" id="dob" onchange="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('dob') is-invalid @enderror" value="{{ $user->dob }}" autocomplete="off">
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
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
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
                                <input type="text" name="address" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('address') is-invalid @enderror" value="{{ $user->address }}" autocomplete="off">
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
                                        <option value="{{ $item->name }}" {{ $user->country == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                <input type="text" name="city" onkeyup="validateBtn()" class="form-control form-control-solid mb-3 mb-lg-0 @error('city') is-invalid @enderror" value="{{ $user->city }}" autocomplete="off">
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
                                <input type="text" onkeyup="validateBtn()" name="zip_code" class="form-control form-control-solid mb-3 mb-lg-0 @error('zip_code') is-invalid @enderror" value="{{ $user->zip_code }}" autocomplete="off">
                                @error('zip_code')
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
                                <label class="required fw-bold fs-6 mb-5">Experience <small>(In years)</small></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div id="experience_slider" class="mt-10"></div>
                                <!--end::Input-->
                                <input type="hidden" name="experience_min" value="{{ old('experience_min', $user->experience_min) }}">
                                <input type="hidden" name="experience_max" value="{{ old('experience_max', $user->experience_max) }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Specialise</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" name="specialise[]" onchange="validateBtn()" data-control="select2" data-placeholder="Choose a field..." data-allow-clear="true" multiple="multiple">
                                    <option></option>
                                    @foreach (departments() as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $user->userSpecialises()->count() > 0 ? in_array($item->id, $user->userSpecialises->pluck('department_id')->toArray()) ? 'selected' : '' : '' }}
                                        >
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('specialise')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
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
    <script src="{{ asset('assets/js/user/edit.js') }}"></script>
@endsection
