<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($guard == 'resturant_manager') {
                if (!resturantManager()->is_mobile_verified) {
                    return redirect()->route('mobile.verify');
                }
            } else {
                if (!auth()->user()->is_mobile_verified) {
                    return redirect()->route('mobile.verify');
                }
            }
        }
        return $next($request);
    }
}
