<?php

namespace App\Http\Controllers\ResturantManager;

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
        $resturant_manager = resturantManager();

        if ($resturant_manager->profile_status == 'submitted') {
            return redirect()->route('resturant.manager.profile.success');
        }

        return view('resturant_manager_profile.complete_profile', get_defined_vars());
    }

    public function profileSave(Request $req)
    {
        $resturant_manager = resturantManager();
        $resturant_manager->avatar = $req->upload_avatar;
        $resturant_manager->first_name = $req->first_name;
        $resturant_manager->last_name = $req->last_name;
        $resturant_manager->age = Carbon::parse($req->dob)->diff(Carbon::now())->y;
        $resturant_manager->dob = $req->dob;
        $resturant_manager->gender = $req->gender;
        $resturant_manager->address = $req->address;
        $resturant_manager->country = $req->country;
        $resturant_manager->city = $req->city;
        $resturant_manager->zip_code = $req->zip_code;
        $resturant_manager->profile_status = 'submitted';
        $resturant_manager->save();

        $resturant = new Resturant();
        $resturant->hotel_id = $req->hotel_id;
        $resturant->resturant_manager_id = $resturant_manager->id;
        $resturant->name = $req->resturant_name;
        $resturant->logo = $req->resturant_logo;
        $resturant->trade_license = $req->resturant_trade_license;
        $resturant->address = $req->resturant_address;
        $resturant->no_of_dept = $req->no_of_dept;
        $resturant->save();

        for ($i=1; $i <= count($req->hourly_rate) ; $i++) {
            if (is_null($req->hourly_rate[$i])) {
                continue;
            }
            if (!isset($req->resturant_depts[$i])) {
                continue;
            }

            ResturantDepartment::create([
                'resturant_id' => $resturant->id,
                'department_id' => $req->resturant_depts[$i],
                'rate' => $req->hourly_rate[$i],
            ]);
        }

        return redirect()->route('resturant.manager.profile.success')->with('success', 'Profile has been successfully submitted for approval');
    }

    public function profileSuccess()
    {
        $resturant_manager = resturantManager();

        return view('resturant_manager_profile.profile_success', get_defined_vars());
    }

    public function getAttachment(Request $req)
    {
        $resturant_manager = resturantManager();
        $type = $req->type;

        if ($type == "avatar") {
            if (!is_null($resturant_manager->avatar)) {
                $obj['name'] = $resturant_manager->avatar;
                $obj['path'] = Storage::disk('public')->url($resturant_manager->avatar);
                $obj['size'] = Storage::disk('public')->size($resturant_manager->avatar);
                $data[] = $obj;

                return response()->json($data);
            } else {
                return response()->json([
                    'error' => 'No file found',
                ]);
            }
        } elseif ($type == "resturant_logo") {
            if (!is_null($resturant_manager->resturant_logo)) {
                $obj['name'] = $resturant_manager->resturant_logo;
                $obj['path'] = Storage::disk('public')->url($resturant_manager->resturant_logo);
                $obj['size'] = Storage::disk('public')->size($resturant_manager->resturant_logo);
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
        $resturant_manager = resturantManager();
        $filename = $req->file->store($resturant_manager->id.'-resturant-manager-attachments', 'public');

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
