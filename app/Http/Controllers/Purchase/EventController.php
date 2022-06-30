<?php

namespace App\Http\Controllers\Purchase;

use DataTables;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function list(Request $req)
    {
        $purchase = purchaseManager();

        $recruiter = $purchase->recruiter;

        $list = Event::with('hotel', 'resturant')->withCount('eventCandidates')
            ->where('recruiter_id', $recruiter->id)
            ->where('status', '!=', 'draft')
            ->orderBy("id", "DESC");
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
                        <li><a href="'.route('purchase.manager.event.view', $row->id).'" data-text="View Event"><span class="la la-eye"></span></a></li>
                    ';
                    if ($row->status == 'pending') {
                        $html .= '
                            <li><a href="'.route('purchase.manager.event.status', $row->id).'?action=approve" data-text="Approve Event"><span class="la la-check-double"></span></a></li>
                        ';
                        $html .= '
                            <li><a href="'.route('purchase.manager.event.status', $row->id).'?action=reject" data-text="Reject Event"><span class="la la-exclamation-triangle"></span></a></li>
                        ';
                    }
                    $html .= '
                            </ul>
                        </div>
                    ';
                    return $html;
                })
                ->rawColumns(['resturant', 'status', 'action'])
                ->make(true);
        } else {
            return view('purchase.event.list', get_defined_vars());
        }
    }

    public function view($id = null)
    {
        $purchase = purchaseManager();

        $recruiter = $purchase->recruiter;

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

        if (is_null($event)) {
            return redirect()->route('purchase.manager.event.list')->with('error', 'There is no such event exists');
        }

        return view('purchase.event.view', get_defined_vars());
    }

    public function status(Request $req, $id = null)
    {
        $purchase = purchaseManager();

        $recruiter = $purchase->recruiter;

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

        if (is_null($event)) {
            return redirect()->route('purchase.manager.event.list')->with('error', 'There is no such event exists');
        }

        if (isset($req->action)) {

            if ($req->action == 'approve') {
                $event->status = 'approve_purchase';
                $event->save();

                return redirect()->route('purchase.manager.event.list')->with('success', 'Event Approved successfully');
            } else if ($req->action == 'reject') {
                $event->status = 'rejected_purchase';
                $event->save();

                return redirect()->route('purchase.manager.event.list')->with('success', 'Event Rejected successfully');
            }
        } else {
            abort(404);
        }
    }
}
