<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveProfile
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
                if (resturantManager()->payment_status !== 'approved') {
                    return redirect()->route('resturant.manager.complete.profile');
                }
            } else {
                if (auth()->user()->payment_status !== 'approved') {
                    return redirect()->route('user.complete.profile');
                }
            }
        }
        return $next($request);
    }
}
