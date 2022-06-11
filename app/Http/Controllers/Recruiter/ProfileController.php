<?php

namespace App\Http\Controllers\Recruiter;

use Carbon\Carbon;
use App\Models\Resturant;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResturantDepartment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function completeProfile()
    {
        $recruiter = recruiter();

        if ($recruiter->profile_status == 'submitted') {
            return redirect()->route('recruiter.profile.success');
        }

        return view('recruiter_profile.complete_profile', get_defined_vars());
    }

    public function profileSave(Request $req)
    {
        $recruiter = recruiter();
        $recruiter->avatar = $req->upload_avatar;
        $recruiter->first_name = $req->first_name;
        $recruiter->last_name = $req->last_name;
        $recruiter->age = Carbon::parse($req->dob)->diff(Carbon::now())->y;
        $recruiter->dob = $req->dob;
        $recruiter->gender = $req->gender;
        $recruiter->address = $req->address;
        $recruiter->country = $req->country;
        $recruiter->city = $req->city;
        $recruiter->zip_code = $req->zip_code;
        $recruiter->profile_status = 'submitted';
        $recruiter->save();

        $resturant = Resturant::where('recruiter_id', $recruiter->id)->first() ?? new Resturant();
        $resturant->hotel_id = $req->hotel_id;
        $resturant->recruiter_id = $recruiter->id;
        $resturant->name = $req->resturant_name;
        $resturant->logo = $req->resturant_logo;
        $resturant->trade_license = $req->resturant_trade_license;
        $resturant->address = $req->resturant_address;
        $resturant->no_of_dept = $req->no_of_dept;
        $resturant->save();

        $resturant->resturantDepartments()->delete();

        for ($i=0; $i < count($req->resturant_depts) ; $i++) {
            ResturantDepartment::create([
                'resturant_id' => $resturant->id,
                'department_id' => $req->resturant_depts[$i],
            ]);
        }

        return redirect()->route('recruiter.profile.success')->with('success', 'Profile has been successfully submitted for approval');
    }

    public function profileSuccess()
    {
        $recruiter = recruiter();

        if ($recruiter->profile_status == 'pending' || $recruiter->profile_status == 'rejected') {
            return redirect()->route('recruiter.complete.profile');
        }

        return view('recruiter_profile.profile_success', get_defined_vars());
    }

    public function getAttachment(Request $req)
    {
        $recruiter = recruiter();
        $type = $req->type;

        if ($type == "avatar") {
            if (!is_null($recruiter->avatar)) {
                $obj['name'] = $recruiter->avatar;
                $obj['path'] = Storage::disk('public')->url($recruiter->avatar);
                $obj['size'] = Storage::disk('public')->size($recruiter->avatar);
                $data[] = $obj;

                return response()->json($data);
            } else {
                return response()->json([
                    'error' => 'No file found',
                ]);
            }
        } elseif ($type == "resturant_logo") {
            if (!is_null($recruiter->resturant->logo)) {
                $obj['name'] = $recruiter->resturant->logo;
                $obj['path'] = Storage::disk('public')->url($recruiter->resturant->logo);
                $obj['size'] = Storage::disk('public')->size($recruiter->resturant->logo);
                $data[] = $obj;

                return response()->json($data);
            } else {
                return response()->json([
                    'error' => 'No file found',
                ]);
            }
        }
    }

    public function uploadAttachment(Request $req)
    {
        $recruiter = recruiter();
        $filename = $req->file->store($recruiter->id.'-recruiter-attachments', 'public');

        return response()->json([
            'success' => $filename
        ]);
    }

    public function destroyAttachment(Request $req)
    {
        if (Storage::disk('public')->exists($req->filename))
            Storage::disk('public')->delete($req->filename);

        return response()->json([
            'success' => $req->filename
        ]);
    }
}
