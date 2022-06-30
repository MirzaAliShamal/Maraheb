@extends('layouts.purchase')

@section('title', $event->title)

@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>{{ $event->title }}</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Events Details</h4>
                            @if ($event->status == 'pending')
                                <div class="ms-auto">
                                    <a href="{{ route('purchase.manager.event.status', $event->id) }}?action=reject" class="theme-btn btn-style-two small ms-0">Reject</a>
                                    <a href="{{ route('purchase.manager.event.status', $event->id) }}?action=approve" class="theme-btn btn-style-one small ms-0">Approve</a>
                                </div>
                            @endif
                        </div>
                        <div class="widget-content  pb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mb-2"><strong>Hotel</strong> : {{ $event->hotel->name }}</h5>
                                    <h5 class="mb-2"><strong>Resturant</strong> : {{ $event->resturant->name }}</h5>
                                    <h5 class="mb-2"><strong>Recruiter</strong> : {{ $event->recruiter->name }}</h5>
                                    <h5 class="mb-2"><strong>Duration</strong> : {{ $event->from_date .' - '. $event->end_date }}</h5>
                                    <h5 class="mb-2"><strong>Timing</strong> : {{ $event->from_time .' - '. $event->end_time }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mb-2"><strong>Description</strong>:</h5>
                                    <h5>{{ is_null($event->description) ? 'N/A' : $event->description }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb-4"><strong>Selected Candidates</strong></h4>
            </div>

            @if ($event->eventCandidates()->count() > 0)
                @foreach ($event->eventCandidates as $item)
                    <div class="candidate-block-three col-lg-12 col-md-12 col-sm-12" data-id="{{ $item->id }}">
                        <div class="inner-box">
                            <div class="content">
                                <figure class="image"><img src="{{ $item->user->profile }}" alt=""></figure>
                                <h4 class="name"><a href="#">{{ $item->user->name }}</a></h4>
                                <ul class="candidate-info">
                                    <li class="ps-0">{{ $item->user->age }} years old</li>
                                    <li><span class="icon flaticon-map-locator"></span> {{ $item->user->address }}</li>
                                    <li><span class="icon flaticon-graph"></span> {{ (int)$item->user->experience_min .' - '. (int)$item->user->experience_max }} years experience</li>
                                </ul>
                                <ul class="post-tags mb-3">
                                    @if ($item->user->userSpecialisations()->count() > 0)
                                        @foreach ($item->user->userSpecialisations as $i)
                                            <li>{{ $i->specialisation->name }}</li>
                                        @endforeach
                                    @endif
                                </ul>

                                <ul>
                                    <li><strong>Department :</strong> {{ $item->department->name }}</li>
                                    <li><strong>Duration :</strong> {{ $item->from_date.' - '.$item->end_date }}</li>
                                    <li><strong>Timing :</strong> {{ $item->from_time.' - '.$item->end_time }}</li>
                                    <li><strong>Hourly Rate :</strong> AED {{ $item->hourly_rate }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12">
                    <div class="no-results text-center my-5">
                        <h2 class="fw-bold mb-2">No Candidates Selected!</h2>
                        <img src="{{ asset('images/no-result.png') }}" width="240px" class="img-fluid" alt="No results">
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection
