<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function mobileVerify()
    {
        if (Auth::check()) {
            return view('front.mobile_verification', get_defined_vars());
        } else if (Auth::guard('resturant_manager')->check()) {
            return view('front.mobile_verification', get_defined_vars());
        } else {
            abort(404);
        }
    }

    public function otpVerify(Request $req)
    {
        if (is_null(session('otp'))) {
            return response()->json(['message' => 'Your One Time Password has expired'], 422);
        } else {
            if ($req->otp == session('otp')) {
                if (Auth::check()) {
                    $user = auth()->user();
                    $user->is_mobile_verified = 1;
                    $user->save();

                    $url = route('user.dashboard');
                } else if (Auth::guard('resturant_manager')->check()) {
                    $manager = resturantManager();
                    $manager->is_mobile_verified = 1;
                    $manager->save();

                    $url = route('resturant.manager.dashboard');
                }

                session()->forget('otp');

                return response()->json([
                    'message' => 'Successfully verified your phone number',
                    'url' => $url,
                ], 200);
            } else {
                return response()->json(['message' => 'Please enter a valid OTP'], 422);
            }
        }
    }
}
