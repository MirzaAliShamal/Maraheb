@extends('layouts.recruiter')

@section('title', 'Events')

@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Events</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Create Event</h4>
                        </div>
                        <div class="widget-content">
                            <form action="{{ route('recruiter.event.save') }}" method="POST" class="default-form" id="addForm">
                                @csrf
                                <input type="hidden" name="hotel_id" value="{{ $recruiter->resturant->hotel_id }}">
                                <input type="hidden" name="resturant_id" value="{{ $recruiter->resturant->id }}">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-sm-12">
                                        <label>Hotel:</label> {{ $recruiter->resturant->hotel->name }}
                                    </div>
                                    <div class="form-group col-lg-6 col-sm-6 col-6">
                                        <label>Resturant:</label> {{ $recruiter->resturant->name }}
                                    </div>
                                    <div class="form-group col-lg-6 col-sm-6 col-6">
                                        <label>Location:</label> {{ $recruiter->resturant->address }}
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Title *</label>
                                        <input type="text" id="title" name="title" class="@error('title') error @enderror" value="{{ old('title') }}" placeholder="e.g Christmas" autocomplete="off">
                                        @error('title')
                                            <label id="title-error" class="error" for="title">
                                                {{ $message }}
                                            </label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <label for="date">Event Date *</label>
                                        <input type="text" id="date" name="date" class="eventDate @error('date') error @enderror" value="{{ old('date') }}" autocomplete="off" readonly>
                                        @error('date')
                                            <label id="date-error" class="error" for="date">
                                                {{ $message }}
                                            </label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                                        <label for="from_time">From Time *</label>
                                        <input type="text" id="from_time" name="from_time" class="eventTime @error('from_time') error @enderror" value="{{ old('from_time') }}" autocomplete="off" readonly>
                                        @error('from_time')
                                            <label id="from_time-error" class="error" for="from_time">
                                                {{ $message }}
                                            </label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                                        <label for="end_time">End Time *</label>
                                        <input type="text" id="end_time" name="end_time" class="eventTime @error('end_time') error @enderror" value="{{ old('end_time', Carbon\Carbon::now()->addHour()->format('H:i a')) }}" autocomplete="off" readonly>
                                        @error('end_time')
                                            <label id="end_time-error" class="error" for="end_time">
                                                {{ $message }}
                                            </label>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Description *</label>
                                        <textarea name="description" class="@error('description') error @enderror" placeholder="About the event...">{{ old('description') }}</textarea>
                                        @error('description')
                                            <label id="description-error" class="error" for="description">
                                                {{ $message }}
                                            </label>
                                        @enderror
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
    <script src="{{ asset('js/recruiter/event/add.js') }}"></script>
@endsection
