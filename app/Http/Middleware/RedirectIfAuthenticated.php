<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "patient" && Auth::guard($guard)->check()) {
            return redirect('/patient');
        }
        if ($guard == "hospital" && Auth::guard($guard)->check()) {
            return redirect('/hospital');
        }
        if ($guard == "practitioner" && Auth::guard($guard)->check()) {
            return redirect('/practitioner');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
