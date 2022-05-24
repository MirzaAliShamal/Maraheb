<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResturantManager;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\VerifyResturantManager;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users', 'unique:resturant_managers'],
            'mobile_no' => ['required', 'max:191', 'unique:users', 'unique:resturant_managers'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            // $otp = generateNumericOTP(6);
            // session(['otp' => $otp]);

            // $account_sid = 'ACecc0da9b492db2a6ad9835b6b319ae35';
            // $auth_token = '8ea98c67307cedd5a1171c7d6c68560e';
            // $twilio_number = '+447360543660';

            // $client = new Client($account_sid, $auth_token);
            // $client->messages->create(trim($request->mobile_no), [
            //     'from' => $twilio_number,
            //     'body' => session('otp'). ' is your one time password (OTP) for mobile number verification']);

            if ($request->role === 'user') {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'mobile_no' => trim($request->mobile_no),
                    'password' => Hash::make($request->password),
                ]);

                event(new Registered($user));

                Auth::login($user);

                $token = $user->id.hash('sha256', Str::random(120));

                VerifyUser::create([
                    'user_id' => $user->id,
                    'token' => $token,
                ]);

                Mail::send('email.general.verify_email', get_defined_vars(), function ($message) use($user) {
                    $message->to($user->email, $user->name);
                    $message->subject('Verify you Email Address');
                });

                return redirect(RouteServiceProvider::USER);

            } else if ($request->role === 'resturant') {
                $resturant_manager = ResturantManager::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'mobile_no' => trim($request->mobile_no),
                    'password' => Hash::make($request->password),
                ]);

                event(new Registered($resturant_manager));

                Auth::guard('resturant_manager')->login($resturant_manager);

                $token = $resturant_manager->id.hash('sha256', Str::random(120));

                VerifyResturantManager::create([
                    'resturant_manager_id' => $resturant_manager->id,
                    'token' => $token,
                ]);

                Mail::send('email.general.verify_email', get_defined_vars(), function ($message) use($resturant_manager) {
                    $message->to($resturant_manager->email, $resturant_manager->name);
                    $message->subject('Verify you Email Address');
                });

                return redirect(RouteServiceProvider::RESTURANT);
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
