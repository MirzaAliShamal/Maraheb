<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserDepartment;
use App\Models\UserSpecialisation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function completeProfile()
    {
        $user = auth()->user();

        if ($user->profile_status == 'submitted') {
            return redirect()->route('user.profile.success');
        }

        return view('user_profile.complete_profile', get_defined_vars());
    }

    public function profileSave(Request $req)
    {
        $user = auth()->user();
        $user->avatar = $req->upload_avatar;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->age = Carbon::parse($req->dob)->diff(Carbon::now())->y;
        $user->dob = $req->dob;
        $user->gender = $req->gender;
        $user->address = $req->address;
        $user->country = $req->country;
        $user->city = $req->city;
        // $user->zip_code = $req->zip_code;
        $user->experience_min = $req->experience_min;
        $user->experience_max = $req->experience_max;
        $user->intro_video = $req->intro_video;
        $user->cv = $req->upload_cv;
        $user->profile_status = 'submitted';
        $user->save();

        if (isset($req->specialisation)) {
            for ($i=0; $i < count($req->specialisation) ; $i++) {
                UserSpecialisation::create([
                    'user_id' => $user->id,
                    'specialisation_id' => $req->specialisation[$i],
                ]);
            }
        }

        return redirect()->route('user.profile.success')->with('success', 'Profile has been successfully submitted for approval');
    }

    public function profileSuccess()
    {
        $user = auth()->user();

        return view('user_profile.profile_success', get_defined_vars());
    }

    public function getAttachment(Request $req)
    {
        $user = auth()->user();
        $type = $req->type;

        if ($type == "avatar") {
            if (!is_null($user->avatar)) {
                $obj['name'] = $user->avatar;
                $obj['path'] = Storage::disk('public')->url($user->avatar);
                $obj['size'] = Storage::disk('public')->size($user->avatar);
                $data[] = $obj;

                return response()->json($data);
            } else {
                return response()->json([
                    'error' => 'No file found',
                ]);
            }
        } elseif ($type == "intro_video") {
            if (!is_null($user->intro_video)) {
                $obj['name'] = $user->intro_video;
                $obj['path'] = Storage::disk('public')->url($user->intro_video);
                $obj['size'] = Storage::disk('public')->size($user->intro_video);
                $data[] = $obj;

                return response()->json($data);
            } else {
                return response()->json([
                    'error' => 'No file found',
                ]);
            }
        } else if ($type == "cv") {
            if (!is_null($user->cv)) {
                $obj['name'] = $user->cv;
                $obj['path'] = Storage::disk('public')->url($user->cv);
                $obj['size'] = Storage::disk('public')->size($user->cv);
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
        $user = auth()->user();
        $filename = $req->file->store($user->id.'-user-attachments', 'public');

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
