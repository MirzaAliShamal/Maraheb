<div class="candidates-selected" data-id="{{ $select->id }}" data-url="{{ route('recruiter.event.remove.candidate', $id) }}">
    <div class="candidate-image">
        <img src="{{ $select->user->profile }}" alt="">
    </div>
    <div class="candidate-detail">
        <h4>{{ $select->user->name }}</h4>
        <p><strong>Department : </strong> {{ $select->department->name }}</p>
        <p><strong>Hourly Rate : </strong> AED {{ $select->hourly_rate }}</p>
        <p><strong>Duration : </strong>{{ $select->from_date .' - '. $select->end_date }}</p>
        <p><strong>Timing : </strong>{{ $select->from_time .' - '. $select->end_time }}</p>
    </div>
    <div class="option-box mt-3">
        <ul class="option-list justify-content-center">
            <li class="edit-selected"><button data-text="Edit"><span class="la la-pencil"></span></button></li>
            <li class="remove-selected"><button data-text="Remove"><span class="la la-times-circle"></span></button></li>
        </ul>
    </div>
</div>
