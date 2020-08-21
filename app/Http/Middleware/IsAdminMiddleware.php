<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::check()) {

            if (Auth::user()->is_admin == 0) {

                // return $next($request);


                return redirect('/user/dashboard');
            }
            return $next($request);
        }


    }
}
