<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use App\Models\ResturantManager;
use App\Http\Controllers\Controller;

class ResturantManagerController extends Controller
{
    public function submitted(Request $req)
    {
        $list = ResturantManager::where('profile_status', 'submitted')->orderBy("id", "DESC");

        if ($req->ajax()) {
            return Datatables::of($list)
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->filterColumn('name', function ($query, $keyword) {
                    $keywords = trim($keyword);
                    $query->whereRaw("CONCAT(first_name, last_name) like ?", ["%{$keywords}%"]);
                })
                ->editColumn('profile_status', function($row) {
                    $html = '';
                    if ($row->profile_status == 'pending') {
                        $html .= '<span class="badge badge-light-info fw-bold me-1">Pending</span>';
                    } else if ($row->profile_status == 'submitted') {
                        $html .= '<span class="badge badge-light-warning fw-bold me-1">New Profile</span>';
                    } else if ($row->profile_status == 'approved') {
                        $html .= '<span class="badge badge-light-success fw-bold me-1">Appproved</span>';
                    } else if ($row->profile_status == 'rejected') {
                        $html .= '<span class="badge badge-light-danger fw-bold me-1">Rejected</span>';
                    }
                    return $html;
                })
                ->editColumn('visibility_status', function($row) {
                    $html = '';
                    if ($row->visibility_status) {
                        $html .= '
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" data-url="'.route('admin.resturant.manager.status', $row->id).'" type="checkbox" name="status" id="status_'.$row->id.'" checked>
                                <label class="form-check-label" for="status_'.$row->id.'"></label>
                            </div>
                        ';
                    } else {
                        $html .= '
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" data-url="'.route('admin.resturant.manager.status', $row->id).'" type="checkbox" name="status" id="status_'.$row->id.'">
                                <label class="form-check-label" for="status_'.$row->id.'"></label>
                            </div>
                        ';
                    }
                    return $html;
                })
                ->addColumn('action', function($row){
                    $html = '';
                    $html .= '
                        <a href="'.route('admin.resturant.manager.profile', $row->id).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6C17 8.76142 14.7614 11 12 11C9.23858 11 7 8.76142 7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6Z" fill="#121319"/>
                                    <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M18.818 14.1248C18.2016 13.4101 17.1428 13.4469 16.3149 13.9001C15.0338 14.6013 13.5635 15 12 15C10.4365 15 8.96618 14.6013 7.68505 13.9001C6.85717 13.4469 5.79841 13.4101 5.182 14.1248C3.82222 15.7014 3 17.7547 3 20V21C3 22.1045 3.89543 23 5 23H19C20.1046 23 21 22.1045 21 21V20C21 17.7547 20.1778 15.7014 18.818 14.1248Z" fill="#191213"/>
                                </svg>
                            </span>
                        </a>
                    ';
                    return $html;
                })
                ->rawColumns(['profile_status', 'visibility_status', 'action'])
                ->make(true);
        } else {
            return view('admin.resturant_manager.submitted', get_defined_vars());
        }
    }

    public function approved(Request $req)
    {
        $list = ResturantManager::where('profile_status', 'approved')->orderBy("id", "DESC");

        if ($req->ajax()) {
            return Datatables::of($list)
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->filterColumn('name', function ($query, $keyword) {
                    $keywords = trim($keyword);
                    $query->whereRaw("CONCAT(first_name, last_name) like ?", ["%{$keywords}%"]);
                })
                ->editColumn('profile_status', function($row) {
                    $html = '';
                    if ($row->profile_status == 'pending') {
                        $html .= '<span class="badge badge-light-info fw-bold me-1">Pending</span>';
                    } else if ($row->profile_status == 'submitted') {
                        $html .= '<span class="badge badge-light-warning fw-bold me-1">Submitted</span>';
                    } else if ($row->profile_status == 'approved') {
                        $html .= '<span class="badge badge-light-success fw-bold me-1">Appproved</span>';
                    } else if ($row->profile_status == 'rejected') {
                        $html .= '<span class="badge badge-light-danger fw-bold me-1">Rejected</span>';
                    }
                    return $html;
                })
                ->editColumn('visibility_status', function($row) {
                    $html = '';
                    if ($row->visibility_status) {
                        $html .= '
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" data-url="'.route('admin.resturant.manager.status', $row->id).'" type="checkbox" name="status" id="status_'.$row->id.'" checked>
                                <label class="form-check-label" for="status_'.$row->id.'"></label>
                            </div>
                        ';
                    } else {
                        $html .= '
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" data-url="'.route('admin.resturant.manager.status', $row->id).'" type="checkbox" name="status" id="status_'.$row->id.'">
                                <label class="form-check-label" for="status_'.$row->id.'"></label>
                            </div>
                        ';
                    }
                    return $html;
                })
                ->addColumn('action', function($row){
                    $html = '';
                    $html .= '
                        <a href="'.route('admin.resturant.manager.profile', $row->id).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6C17 8.76142 14.7614 11 12 11C9.23858 11 7 8.76142 7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6Z" fill="#121319"/>
                                    <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M18.818 14.1248C18.2016 13.4101 17.1428 13.4469 16.3149 13.9001C15.0338 14.6013 13.5635 15 12 15C10.4365 15 8.96618 14.6013 7.68505 13.9001C6.85717 13.4469 5.79841 13.4101 5.182 14.1248C3.82222 15.7014 3 17.7547 3 20V21C3 22.1045 3.89543 23 5 23H19C20.1046 23 21 22.1045 21 21V20C21 17.7547 20.1778 15.7014 18.818 14.1248Z" fill="#191213"/>
                                </svg>
                            </span>
                        </a>
                    ';
                    return $html;
                })
                ->rawColumns(['profile_status', 'visibility_status', 'action'])
                ->make(true);
        } else {
            return view('admin.resturant_manager.approved', get_defined_vars());
        }
    }

    public function rejected(Request $req)
    {
        $list = ResturantManager::where('profile_status', 'rejected')->orderBy("id", "DESC");

        if ($req->ajax()) {
            return Datatables::of($list)
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->filterColumn('name', function ($query, $keyword) {
                    $keywords = trim($keyword);
                    $query->whereRaw("CONCAT(first_name, last_name) like ?", ["%{$keywords}%"]);
                })
                ->editColumn('profile_status', function($row) {
                    $html = '';
                    if ($row->profile_status == 'pending') {
                        $html .= '<span class="badge badge-light-info fw-bold me-1">Pending</span>';
                    } else if ($row->profile_status == 'submitted') {
                        $html .= '<span class="badge badge-light-warning fw-bold me-1">Submitted</span>';
                    } else if ($row->profile_status == 'approved') {
                        $html .= '<span class="badge badge-light-success fw-bold me-1">Appproved</span>';
                    } else if ($row->profile_status == 'rejected') {
                        $html .= '<span class="badge badge-light-danger fw-bold me-1">Rejected</span>';
                    }
                    return $html;
                })
                ->editColumn('visibility_status', function($row) {
                    $html = '';
                    if ($row->visibility_status) {
                        $html .= '
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" data-url="'.route('admin.resturant.manager.status', $row->id).'" type="checkbox" name="status" id="status_'.$row->id.'" checked>
                                <label class="form-check-label" for="status_'.$row->id.'"></label>
                            </div>
                        ';
                    } else {
                        $html .= '
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" data-url="'.route('admin.resturant.manager.status', $row->id).'" type="checkbox" name="status" id="status_'.$row->id.'">
                                <label class="form-check-label" for="status_'.$row->id.'"></label>
                            </div>
                        ';
                    }
                    return $html;
                })
                ->addColumn('action', function($row){
                    $html = '';
                    $html .= '
                        <a href="'.route('admin.resturant.manager.profile', $row->id).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17 6C17 8.76142 14.7614 11 12 11C9.23858 11 7 8.76142 7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6Z" fill="#121319"/>
                                    <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M18.818 14.1248C18.2016 13.4101 17.1428 13.4469 16.3149 13.9001C15.0338 14.6013 13.5635 15 12 15C10.4365 15 8.96618 14.6013 7.68505 13.9001C6.85717 13.4469 5.79841 13.4101 5.182 14.1248C3.82222 15.7014 3 17.7547 3 20V21C3 22.1045 3.89543 23 5 23H19C20.1046 23 21 22.1045 21 21V20C21 17.7547 20.1778 15.7014 18.818 14.1248Z" fill="#191213"/>
                                </svg>
                            </span>
                        </a>
                    ';
                    return $html;
                })
                ->rawColumns(['profile_status', 'visibility_status', 'action'])
                ->make(true);
        } else {
            return view('admin.resturant_manager.rejected', get_defined_vars());
        }
    }

    public function pending(Request $req)
    {
        $list = ResturantManager::where('profile_status', 'pending')->orderBy("id", "DESC");

        if ($req->ajax()) {
            return Datatables::of($list)
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->filterColumn('name', function ($query, $keyword) {
                    $keywords = trim($keyword);
                    $query->whereRaw("CONCAT(first_name, last_name) like ?", ["%{$keywords}%"]);
                })
                ->editColumn('profile_status', function($row) {
                    $html = '';
                    if ($row->profile_status == 'pending') {
                        $html .= '<span class="badge badge-light-info fw-bold me-1">Pending</span>';
                    } else if ($row->profile_status == 'submitted') {
                        $html .= '<span class="badge badge-light-warning fw-bold me-1">Submitted</span>';
                    } else if ($row->profile_status == 'approved') {
                        $html .= '<span class="badge badge-light-success fw-bold me-1">Appproved</span>';
                    } else if ($row->profile_status == 'rejected') {
                        $html .= '<span class="badge badge-light-danger fw-bold me-1">Rejected</span>';
                    }
                    return $html;
                })
                ->editColumn('visibility_status', function($row) {
                    $html = '';
                    if ($row->visibility_status) {
                        $html .= '
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" data-url="'.route('admin.resturant.manager.status', $row->id).'" type="checkbox" name="status" id="status_'.$row->id.'" checked>
                                <label class="form-check-label" for="status_'.$row->id.'"></label>
                            </div>
                        ';
                    } else {
                        $html .= '
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" data-url="'.route('admin.resturant.manager.status', $row->id).'" type="checkbox" name="status" id="status_'.$row->id.'">
                                <label class="form-check-label" for="status_'.$row->id.'"></label>
                            </div>
                        ';
                    }
                    return $html;
                })
                ->addColumn('action', function($row){
                    $html = '';
                    $html .= '
                        <a href="'.route('admin.resturant.manager.delete', $row->id).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-item">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                        </a>
                    ';
                    return $html;
                })
                ->rawColumns(['profile_status', 'visibility_status', 'action'])
                ->make(true);
        } else {
            return view('admin.resturant_manager.pending', get_defined_vars());
        }
    }

    public function profile($id = null)
    {
        $resturant_manager = ResturantManager::find($id);
        if ($resturant_manager->profile_status == 'pending') {
            return redirect()->back();
        }

        return view('admin.resturant_manager.profile', get_defined_vars());
    }

    public function profileStatus(Request $req, $id = null)
    {
        $resturant_manager = ResturantManager::find($id);
        $action = $req->action;

        if ($action == "reject") {
            $resturant_manager->profile_status = 'rejected';
            $resturant_manager->save();

            return redirect()->back()->with('success', 'Resturant Manager Profile Successfully Rejected');
        } else if ($action == "approve") {
            $resturant_manager->profile_status = 'approved';
            $resturant_manager->save();

            return redirect()->back()->with('success', 'Resturant Manager Profile Successfully Approved');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete($id = null)
    {
        ResturantManager::find($id)->delete();

        return redirect()->back()->with('success', 'Resturant Manager successfully removed from the system.');
    }

    public function status($id = null)
    {
        $resturant_manager = ResturantManager::find($id);

        if ($resturant_manager->visibility_status == 1) {
            $resturant_manager->visibility_status = 0;

            $msg = 'Resturant Manager access to dashboard temporarily disabled successfully!';
        } else {
            $resturant_manager->visibility_status = 1;

            $msg = 'Resturant Manager access to dashboard successfully restored!';
        }
        $resturant_manager->save();

        return response()->json([
            'status' => 200,
            'message' => $msg,
        ]);
    }
}
