@extends('layouts.recruiter')

@section('title', 'Purchase Managers')

@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Purchase Managers</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Add Purchase Manager</h4>
                        </div>
                        <div class="widget-content">
                            <form action="{{ route('recruiter.purchase.manager.save') }}" method="POST" class="default-form" id="addForm">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>First Name</label>
                                        <input type="text" id="first_name" name="first_name" class="@error('first_name') error @enderror" value="{{ old('first_name') }}" placeholder="John" autocomplete="off">
                                        <label id="first_name-error" class="error" for="first_name">
                                            @error('first_name')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Last Name</label>
                                        <input type="text" id="last_name" name="last_name" class="@error('last_name') error @enderror" value="{{ old('last_name') }}" placeholder="Doe" autocomplete="off">
                                        <label id="last_name-error" class="error" for="last_name">
                                            @error('last_name')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Email</label>
                                        <input type="email" id="email" name="email" class="@error('email') error @enderror" value="{{ old('email') }}" placeholder="email@example.com" autocomplete="off">
                                        <label id="email-error" class="error" for="email">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Mobile No</label>
                                        <input type="tel" id="mobile_no" name="mobile_no" class="@error('mobile_no') error @enderror" value="{{ old('mobile_no') }}" placeholder="" autocomplete="off">
                                        <label id="mobile_no-error" class="error" for="mobile_no">
                                            @error('mobile_no')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 text-right">
                                        <button type="submit" class="theme-btn btn-style-one" id="submitBtn">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/recruiter/purchase_manager/add.js') }}"></script>
@endsection
