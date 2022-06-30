@if (count($candidates) > 0)
    @foreach ($candidates as $item)
        <div class="candidate-block-three col-lg-12 col-md-12 col-sm-12" data-id="{{ $item->id }}">
            <div class="inner-box">
                <div class="content">
                    <figure class="image"><img src="{{ $item->profile }}" alt=""></figure>
                    <h4 class="name"><a href="#">{{ $item->name }}</a></h4>
                    <ul class="candidate-info">
                        <li class="ps-0">{{ $item->age }} years old</li>
                        <li><span class="icon flaticon-map-locator"></span> {{ $item->address }}</li>
                        <li><span class="icon flaticon-graph"></span> {{ (int)$item->experience_min .' - '. (int)$item->experience_max }} years experience</li>
                    </ul>
                    <ul class="post-tags">
                        @if ($item->userSpecialisations()->count() > 0)
                            @foreach ($item->userSpecialisations as $item)
                                <li>{{ $item->specialisation->name }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="option-box">
                    <ul class="option-list">
                        <li><button data-text="View More Details"><span class="la la-eye"></span></button></li>
                        <li class="select-candidate"><button data-text="Select Candidate"><span class="la la-check"></span></button></li>
                    </ul>
                </div>
            </div>
            <div class="selection-box" style="display: none">
                <div class="default-form">
                    <div class="row">
                        <div class="form-group col-md-3 col-sm-6 col-6">
                            <label for="department">Department</label>
                            <select name="department" class="chosen-select" tabindex="4">
                                <option value="" selected>Select Department</option>
                                @if ($event->resturant->resturantDepartments()->count() > 0)
                                    @foreach ($event->resturant->resturantDepartments as $item)
                                        <option value="{{ $item->department->id }}">
                                            {{ $item->department->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="">No Departments</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-3 col-sm-6 col-6">
                            <label for="date">From & To Date</label>
                            <input type="text" name="date" class="eventDate" value="{{ Carbon\Carbon::parse($event->from_date)->format('m/d/Y') .' - '. Carbon\Carbon::parse($event->end_date)->format('m/d/Y') }}" autocomplete="off" readonly>
                        </div>

                        <div class="form-group col-md-3 col-sm-6 col-6">
                            <label for="from_time">Timing</label>
                            <input type="text" name="from_time" class="eventTime" value="{{ $event->from_time }}" autocomplete="off" readonly>
                        </div>

                        <div class="form-group col-md-3 col-sm-6 col-6">
                            <label for=""></label>
                            <input type="text" name="end_time" class="eventTime mt-1" value="{{ $event->end_time }}" autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="button" class="theme-btn btn-style-three small cancel-selection">Cancel</button>
                        <button type="button" data-url="{{ route('recruiter.event.select.candidate', $event->id) }}" class="theme-btn btn-style-one small confirm-selection">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    @if ($req->page < $candidates->lastPage())
        <div class="col-lg-12">
            <div class="no-results text-center my-5">
                <h2 class="fw-bold mb-2">We're Sorry!</h2>
                <img src="{{ asset('images/no-result.png') }}" width="240px" class="img-fluid" alt="No results">
                <h2 class="fw-bold mt-2">No Results Found</h2>
            </div>
        </div>
    @endif
@endif
