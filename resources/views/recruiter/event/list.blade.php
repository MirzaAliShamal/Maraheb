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
                            <h4>All Events</h4>
                            <a href="{{ route('recruiter.event.add') }}" class="theme-btn btn-style-one small ms-0">Create Event</a>
                        </div>
                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Resturant</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Timing</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/recruiter/event/list.js') }}"></script>
@endsection
