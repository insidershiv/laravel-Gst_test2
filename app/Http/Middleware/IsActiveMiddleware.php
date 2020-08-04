<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IsActiveMiddleware
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
        //$request->session_destroy();
        // print_r(Auth::user()->is_active);
        // $request->session_destroy();


        if (Auth::user() && Auth::check()) {
            if (Auth::user()->is_active == 0) {

                // return $next($request);

                return redirect('/blocked_user');

            }
             return $next($request);


        }


        // }
    }
}
