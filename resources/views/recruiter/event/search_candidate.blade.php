@extends('layouts.recruiter')

@section('title', 'Search Candidates')

@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Search Candidates</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-content py-3">
                            <form action="" class="default-form" id="filterForm">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="department">Department</label>
                                        <select data-placeholder="Choose departments..." name="departments[]" class="chosen-select" multiple tabindex="4">
                                            @if ($event->resturant->resturantDepartments()->count() > 0)
                                                @foreach ($event->resturant->resturantDepartments as $item)
                                                    <option value="{{ $item->department->id }}"
                                                        {{ isset($req->departments) ? in_array($item->department->id, $req->departments) ? 'selected' : '' : '' }}
                                                    >
                                                        {{ $item->department->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="">No Departments</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="gender">Gender</label>
                                        <select data-placeholder="Choose gender" name="gender" id="gender" class="chosen-select">
                                            <option value="" selected>Choose gender...</option>
                                            <option value="male" {{ isset($req->gender) && $req->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ isset($req->gender) && $req->gender == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ isset($req->gender) && $req->gender == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="age">Age</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" id="age_min" name="age_min" value="{{ isset($req->age_min) ? $req->age_min : '' }}" placeholder="Min" autocomplete="off">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" id="age_max" name="age_max" value="{{ isset($req->age_max) ? $req->age_max : '' }}" placeholder="Max" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="specialisation">Specialisation</label>
                                        <select data-placeholder="Choose specialisations..." name="specialisations[]" class="chosen-select" multiple tabindex="4">
                                            @foreach (specialisations() as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ isset($req->specialisations) ? in_array($item->id, $req->specialisations) ? 'selected' : '' : '' }}
                                                >
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="experience">Experience</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" id="experience_min" name="experience_min" value="{{ isset($req->experience_min) ? $req->experience_min : '' }}" placeholder="Min" autocomplete="off">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" id="experience_max" name="experience_max" value="{{ isset($req->experience_max) ? $req->experience_max : '' }}" placeholder="Max" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 mb-0">
                                        <button type="button" class="theme-btn btn-style-one large filter-button">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row data-wrapper">

        </div>

        <div class="auto-load text-center" style="display: none">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>

        <div class="row loader-button" style="display: none;">
            <div class="col-12 text-center">
                <button type="button" class="theme-btn btn-style-one large load-more-button">Load More</button>
            </div>
        </div>
    </div>
</section>

<div class="modal right-modal fade" id="rightModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
                <div class="option-box">
                    <ul class="option-list">
                        <li class="ms-auto"><button data-text="Close" data-dismiss="modal"><span class="la la-times-circle"></span></button></li>
                    </ul>
                </div>

                <div class="selected-candidates-wrapper">
                    @if ($event->eventCandidates()->count() > 0)
                        @foreach ($event->eventCandidates as $item)
                            <div class="candidates-selected" data-id="{{ $item->id }}" data-url="{{ route('recruiter.event.remove.candidate', $event->id) }}">
                                <div class="candidate-image">
                                    <img src="{{ $item->user->profile }}" alt="">
                                </div>
                                <div class="candidate-detail">
                                    <h4>{{ $item->user->name }}</h4>
                                    <p><strong>Department : </strong> {{ $item->department->name }}</p>
                                    <p><strong>Hourly Rate : </strong> AED {{ $item->hourly_rate }}</p>
                                    <p><strong>Duration : </strong>{{ $item->from_date .' - '. $item->end_date }}</p>
                                    <p><strong>Timing : </strong>{{ $item->from_time .' - '. $item->end_time }}</p>
                                </div>
                                <div class="option-box mt-3">
                                    <ul class="option-list justify-content-center">
                                        <li class="edit-selected"><button data-text="Edit"><span class="la la-pencil"></span></button></li>
                                        <li class="remove-selected"><button data-text="Remove"><span class="la la-times-circle"></span></button></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
			</div>
            <div class="modal-footer">
				<button type="button" class="theme-btn btn-style-three small" data-dismiss="modal">Close</button>
				<button type="button" data-url="{{ route('recruiter.event.processed', $event->id) }}" class="theme-btn btn-style-one small save-event">Save Event</button>
			</div>
		</div>
	</div>
</div>

<div class="selected-toggler" data-toggle="modal" data-target="#rightModal">
    <span class="la la-check"></span>
    <span>Selected</span>
    <span class="selected-count">{{ $event->eventCandidates()->count() }}</span>
</div>

<div class="create-event" data-url="{{ route('recruiter.event.processed', $event->id) }}">
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
        </svg>
    </span>
    <span>Create</span>
</div>

@endsection
@section('js')
    <script>
        const eventId = "{{ $id }}";
    </script>
    <script src="{{ asset('js/recruiter/event/search_candidate.js') }}"></script>
@endsection
