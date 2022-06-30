@extends('layouts.recruiter')

@section('title', 'Event Candidates')

@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Event Candidates</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Event Candidates</h4>
                            <a href="{{ route('recruiter.event.search.candidate', $id) }}" class="theme-btn btn-style-one small ms-0">Search Candidates</a>
                        </div>
                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Candidate</th>
                                            <th>Department</th>
                                            <th>Date</th>
                                            <th>Timing</th>
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
    <script>
        const eventId = "{{ $id }}";
    </script>
    <script src="{{ asset('js/recruiter/event/candidate.js') }}"></script>
@endsection
