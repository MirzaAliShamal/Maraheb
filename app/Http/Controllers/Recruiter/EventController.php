<?php

namespace App\Http\Controllers\Recruiter;

use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventCandidate;
use App\Models\EventCandidateSlot;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function list(Request $req)
    {
        $recruiter = recruiter();

        $list = Event::with('hotel', 'resturant')->where('recruiter_id', $recruiter->id)->orderBy("id", "DESC");
        if ($req->ajax()) {
            return Datatables::of($list)
                ->addColumn('resturant', function($row) {
                    $html = '';
                    $html .= '
                        <div class="d-flex flex-column">
                            <span>'.$row->resturant->name.'</span>
                            <span><small>'.$row->hotel->name.'</small></span>
                        </div>
                    ';
                    return $html;
                })
                ->addColumn('date', function($row) {
                    $html = '';
                    $html .= $row->from_date.' - '.$row->end_date;
                    return $html;
                })
                ->addColumn('timing', function($row) {
                    $html = '';
                    $html .= $row->from_time.' - '.$row->end_time;
                    return $html;
                })
                ->editColumn('status', function($row) {
                    $html = '';

                    if ($row->status == 'draft') {
                        $html .= '<span class="badge badge-light-dark">Draft</span>';
                    }
                    if ($row->status == 'pending') {
                        $html .= '<span class="badge badge-light-primary">Pending</span>';
                    }
                    if ($row->status == 'approve_purchase') {
                        $html .= '<span class="badge badge-light-info">Purhcase Manager Approved</span>';
                    }
                    if ($row->status == 'approved') {
                        $html .= '<span class="badge badge-light-success">Approved</span>';
                    }
                    if ($row->status == 'rejected_purchase') {
                        $html .= '<span class="badge badge-light-warning">Purhcase Manager Rejected</span>';
                    }
                    if ($row->status == 'rejected') {
                        $html .= '<span class="badge badge-light-danger">Rejected</span>';
                    }

                    return $html;
                })
                ->addColumn('action', function($row){
                    $html = '';
                    $html .= '
                        <div class="option-box">
                            <ul class="option-list">
                    ';
                    $html .= '
                        <li><a href="'.route('recruiter.event.candidate', $row->id).'" data-text="Candidates"><span class="la la-users"></span></a></li>
                    ';
                    // $html .= '
                    //     <li><button data-text="Edit Event"><span class="la la-pencil"></span></button></li>
                    // ';
                    $html .= '
                        <li><button data-text="Delete Event"><span class="la la-times-circle"></span></button></li>
                    ';
                    $html .= '
                            </ul>
                        </div>
                    ';
                    return $html;
                })
                ->rawColumns(['resturant', 'status', 'action'])
                ->make(true);
        } else {
            return view('recruiter.event.list', get_defined_vars());
        }
    }

    public function add()
    {
        $recruiter = recruiter();
        return view('recruiter.event.add', get_defined_vars());
    }

    public function save(Request $req)
    {
        $recruiter = recruiter();

        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'from_time' => 'required',
            'end_time' => 'required',
        ]);

        $event = new Event();
        $event->recruiter_id = $recruiter->id;
        $event->resturant_id = $req->resturant_id;
        $event->hotel_id = $req->hotel_id;
        $event->title = $req->title;
        $event->description = $req->description;
        $event->from_date = Carbon::parse(explode(' - ', $req->date)[0])->format('Y-m-d');
        $event->end_date = Carbon::parse(explode(' - ', $req->date)[1])->format('Y-m-d');
        $event->from_time = $req->from_time;
        $event->end_time = $req->end_time;
        $event->save();


        return redirect()->route('recruiter.event.search.candidate', $event->id)->with('success', 'Event successfully created. Select candidates now');
    }

    public function candidate(Request $req, $id = null)
    {
        $recruiter = recruiter();
        $event = Event::find($id);

        if (is_null($event)) {
            return redirect()->route('recruiter.event.list')->with('error', 'There is no such event exists');
        }

        if ($event->eventCandidates()->count() <= 0) {
            return redirect()->route('recruiter.event.search.candidate', $id);
        } else {
            $list = EventCandidate::with('department', 'user')->where('event_id', $event->id);
            if ($req->ajax()) {
                return Datatables::of($list)
                    ->addColumn('user', function($row) {
                        $html = '';
                        $html .= '
                            <div class="d-flex">
                                <span class="small-avatar"><img src="'.$row->user->profile.'" ></span>
                                <span class="ps-2"><strong>'.$row->user->name.'</strong></span>
                            </div>
                        ';
                        return $html;
                    })
                    ->addColumn('department', function($row) {
                        return $row->department->name;
                    })
                    ->addColumn('date', function($row) {
                        $html = '';
                        $html .= $row->from_date.' - '.$row->end_date;
                        return $html;
                    })
                    ->addColumn('timing', function($row) {
                        $html = '';
                        $html .= $row->from_time.' - '.$row->end_time;
                        return $html;
                    })
                    ->rawColumns(['user', 'status', 'action'])
                    ->make(true);
            } else {
                return view('recruiter.event.candidate', get_defined_vars());
            }
        }
    }



    public function processed($id = null)
    {
        $recruiter = recruiter();
        $event = Event::find($id);

        if (is_null($event)) {
            return redirect()->route('recruiter.event.list')->with('error', 'There is no such event exists');
        }

        if ($event->eventCandidates()->count() <= 0) {
            return redirect()->route('recruiter.event.search.candidate', $id)->with('error', 'Please select candidate to proceed');
        }

        $event->status = 'pending';
        $event->save();

        return redirect()->route('recruiter.event.list')->with('success', 'Event submitted for approval!');
    }




    public function searchCandidate(Request $req, $id = null)
    {
        if (is_null($id)) {
            abort(404);
        }
        if (!Event::find($id)) {
            return redirect()->route('recruiter.event.list')->with('error', 'There is no such event exists');
        }

        $event = Event::with(
                'recruiter',
                'hotel',
                'resturant',
                'resturant.resturantDepartments',
                'resturant.resturantDepartments.department',
                'eventCandidates',
                'eventCandidates.department',
                'eventCandidates.user',
                'eventCandidates.event',
                'eventCandidates.recruiter'
            )->find($id);

        $from_date = Carbon::parse($event->from_date);
        $end_date = Carbon::parse($event->end_date);

        $slots = generateDateRange($from_date, $end_date);

        $from_slots = [];
        foreach ($slots as $value) {
            $from_slots[] = Carbon::parse($value.' '.$event->from_time)->format('Y-m-d H:i:s');
        }
        $end_slots = [];
        foreach ($slots as $value) {
            $end_slots[] = Carbon::parse($value.' '.$event->end_time)->format('Y-m-d H:i:s');
        }

        $candidates = User::with(
                'userSpecialisations',
                'userSpecialisations.specialisation',
                'userDepartments',
                'userDepartments.department',
                'eventCandidates',
                'eventCandidateSlots',
            );

        $candidates = $candidates->where(function($q) {
            $q->where('profile_status', 'approved');
            $q->where('visibility_status', true);
        });

        // $candidates = $candidates->with('eventCandidateSlots', function($q) use($from_slots, $end_slots) {
        //     $q->whereNotIn('from', $from_slots);
        //     $q->whereNotIn('end', $end_slots);
        // });

        if ($event->resturant->resturantDepartments()->count() > 0) {
            $candidates = $candidates->whereHas('userDepartments', function ($q) use($event) {
                $q->whereIn('department_id', $event->resturant->resturantDepartments->pluck('department_id')->toArray());
            });
        }

        if (isset($req->departments)) {
            $candidates = $candidates->whereHas('userDepartments', function ($q) use($req) {
                $q->whereIn('department_id', $req->departments);
            });
        }

        if (isset($req->gender)) {
            $candidates = $candidates->where('gender', $req->gender);
        }

        if (isset($req->age_min)) {
            $candidates = $candidates->where('age', '>=', $req->age_min);
        }

        if (isset($req->age_max)) {
            $candidates = $candidates->where('age', '<=', $req->age_max);
        }

        if (isset($req->specialisations)) {
            $candidates = $candidates->whereHas('userSpecialisations', function ($q) use($req) {
                $q->whereIn('specialisation_id', $req->specialisations);
            });
        }

        if (isset($req->experience_min)) {
            $candidates = $candidates->where('experience_min', '>=', $req->experience_min.'.00');
        }

        if (isset($req->experience_max)) {
            $candidates = $candidates->where('experience_max', '<=', $req->experience_max.'.00');
        }

        $candidates = $candidates->where(function($q) use($from_slots, $end_slots) {
            $q->whereHas('eventCandidateSlots', function ($u) use($from_slots, $end_slots) {
                $u->whereNotIn('from', $from_slots);
                $u->whereNotIn('end', $end_slots);
            });
            $q->orWhereDoesntHave('eventCandidateSlots');
        });

        if ($req->ajax()) {

            $candidates = $candidates->orderBy('first_name', 'ASC')->paginate(15);

            return view('ajax.recruiter.search_candidate', get_defined_vars());
        }


        return view('recruiter.event.search_candidate', get_defined_vars());
    }

    public function selectCandidate(Request $req, $id = null)
    {
        $recruiter = recruiter();
        $event = Event::find($id);

        $from_date = Carbon::parse(explode(' - ', $req->date)[0]);
        $end_date = Carbon::parse(explode(' - ', $req->date)[1]);

        $slots = generateDateRange($from_date, $end_date);

        $from_slots = [];
        foreach ($slots as $value) {
            $from_slots[] = Carbon::parse($value.' '.$req->from_time)->format('Y-m-d H:i:s');
        }
        $end_slots = [];
        foreach ($slots as $value) {
            $end_slots[] = Carbon::parse($value.' '.$req->end_time)->format('Y-m-d H:i:s');
        }

        $already_exists = EventCandidateSlot::where('user_id', $req->user_id)->where(function ($q) use($from_slots, $end_slots) {
            $q->whereIn('from', $from_slots);
            $q->orWhereIn('end', $end_slots);
        })->exists();


        if ($already_exists) {
            return response()->json([
                'status' => 422,
                'message' => 'Candidate is not available for this time period',
            ]);
        }

        $hourly_rate = 0;
        if (!is_null($recruiter->resturant)) {
            if ($recruiter->resturant->resturantDepartments()->count() > 0) {
                $res = $recruiter->resturant->resturantDepartments()->where('department_id', $req->department_id)->first();
                if (!is_null($res)) {
                    $hourly_rate = (int)$res->rate;
                }
            }
        }

        $select = new EventCandidate();
        $select->recruiter_id = $recruiter->id;
        $select->event_id = $id;
        $select->user_id = $req->user_id;
        $select->department_id = $req->department_id;
        $select->from_date = $from_date->format('Y-m-d');
        $select->end_date = $end_date->format('Y-m-d');
        $select->from_time = $req->from_time;
        $select->end_time = $req->end_time;
        $select->hourly_rate = $hourly_rate;
        $select->save();

        if (count($slots) > 0) {
            foreach ($slots as $value) {
                $slot = new EventCandidateSlot();
                $slot->event_candidate_id = $select->id;
                $slot->user_id = $req->user_id;
                $slot->from = Carbon::parse($value.' '.$req->from_time)->format('Y-m-d H:i:s');
                $slot->end = Carbon::parse($value.' '.$req->end_time)->format('Y-m-d H:i:s');
                $slot->save();
            }
        }

        return response()->json([
            'status' => 200,
            'count' => $event->eventCandidates()->count(),
            'candidate' => view('ajax.recruiter.selected_candidate', get_defined_vars())->render(),
        ]);

    }

    public function removeCandidate(Request $req, $id = null)
    {
        $recruiter = recruiter();

        if (isset($req->event_candidate_id)) {
            EventCandidate::find($req->event_candidate_id)->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Candidate removed from the selection',
            ]);
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'There is an issue while removing the candidate',
            ]);
        }
    }
}
