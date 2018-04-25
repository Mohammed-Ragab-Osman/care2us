<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->isAdmin()) {
    //         return $next($request);
    //     }
    //
    //     return redirect('/');
    //
    // }
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/ph-admin');
        }

        return $next($request);
    }
}
