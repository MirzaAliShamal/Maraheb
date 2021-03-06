<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VerifyRecruiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\General\VerificationEmail;

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
        } else if (Auth::guard('recruiter')->check()) {
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
                } else if (Auth::guard('recruiter')->check()) {
                    $recruiter = recruiter();
                    $recruiter->is_mobile_verified = 1;
                    $recruiter->save();

                    $url = route('recruiter.dashboard');
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

    public function emailVerify(Request $req) {
        if (Auth::check()) {
            if (isset($req->token)) {
                $verify = VerifyUser::where('token', $req->token)->first();

                if (!is_null($verify)) {
                    $user = $verify->user;
                    $user->email_verified_at = Carbon::now();
                    $user->is_email_verified = 1;
                    $user->save();

                    return redirect()->route('user.dashboard');
                } else {
                    abort(403);
                }
            } else {
                return view('front.email_verification', get_defined_vars());
            }
        } else if (Auth::guard('recruiter')->check()) {
            if (isset($req->token)) {
                $verify = VerifyRecruiter::where('token', $req->token)->first();

                if (!is_null($verify)) {
                    $recruiter = $verify->recruiter;
                    $recruiter->email_verified_at = Carbon::now();
                    $recruiter->is_email_verified = 1;
                    $recruiter->save();

                    return redirect()->route('recruiter.dashboard');
                } else {
                    abort(403);
                }
            } else {
                return view('front.email_verification', get_defined_vars());
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function resendEmailVerify()
    {
        if (Auth::check()) {
            $user = auth()->user();
            $token = $user->verifyUser->token;

            if (!is_null($token)) {

                $data['token'] = $token;
                $email = new VerificationEmail($data);
                Mail::to($user->email)->send($email);

                return redirect()->back();
            } else {
                abort(403);
            }
        } else if (Auth::guard('recruiter')->check()) {
            $recruiter = recruiter();
            $token = $recruiter->verifyRecruiter->token;

            if (!is_null($token)) {
                Mail::send('email.general.verify_email', get_defined_vars(), function ($message) use($recruiter) {
                    $message->to($recruiter->email, $recruiter->name);
                    $message->subject('Verify you Email Address');
                });

                return redirect()->back();
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login');
        }
    }
}
