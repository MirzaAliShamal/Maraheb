@extends('layouts.admin')

@section('title', 'Departments')
@section('page-heading', 'Departments')

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
        <a href="{{ route('admin.department.list') }}" class="text-muted text-hover-primary">Departments</a>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-dark">Add Department</li>
    <!--end::Item-->
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Add Department</h3>
                </div>
            </div>

            <div class="card-body py-10">
                <form action="{{ route('admin.department.save') }}" method="POST" enctype="multipart/form-data" id="addForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off">
                                @error('name')
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
                                <label class="fw-bold fs-6 mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0 @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7">
                                <button type="submit" id="addFormBtn" class="btn btn-primary mt-5">
                                    <span class="indicator-label">
                                        Save
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
    <script src="{{ asset('assets/js/department/add.js') }}"></script>
@endsection
