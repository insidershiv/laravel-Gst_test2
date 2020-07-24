<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class IsAdmin
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


        //   $user = Auth::user();
        //  print_r ($user['name']);

        if(Auth::user()) {
            if ( Auth::user()->is_admin == 1) {
                return $next($request);
            }

        }



        abort(403);

        //  return $next($request);
    }
}
