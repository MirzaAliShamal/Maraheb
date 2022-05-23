<?php

namespace App\Http\Controllers\ResturantManager;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $resturant_manager->dob = $req->dob;
        $resturant_manager->gender = $req->gender;
        $resturant_manager->address = $req->address;
        $resturant_manager->country = $req->country;
        $resturant_manager->city = $req->city;
        $resturant_manager->zip_code = $req->zip_code;
        $resturant_manager->experience = $req->experience;
        $resturant_manager->specalise = $req->specalise;
        $resturant_manager->intro_video = $req->intro_video;
        $resturant_manager->cv = $req->upload_cv;
        $resturant_manager->profile_status = 'submitted';
        $resturant_manager->save();

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
        } elseif ($type == "intro_video") {
            if (!is_null($resturant_manager->intro_video)) {
                $obj['name'] = $resturant_manager->intro_video;
                $obj['path'] = Storage::disk('public')->url($resturant_manager->intro_video);
                $obj['size'] = Storage::disk('public')->size($resturant_manager->intro_video);
                $data[] = $obj;

                return response()->json($data);
            } else {
                return response()->json([
                    'error' => 'No file found',
                ]);
            }
        } else if ($type == "cv") {
            if (!is_null($resturant_manager->cv)) {
                $obj['name'] = $resturant_manager->cv;
                $obj['path'] = Storage::disk('public')->url($resturant_manager->cv);
                $obj['size'] = Storage::disk('public')->size($resturant_manager->cv);
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
