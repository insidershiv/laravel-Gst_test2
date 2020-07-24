<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            print_r(Auth::user()->name);
            //return redirect(RouteServiceProvider::HOME);



            if(Auth::user()->is_admin == 1) {

                return redirect('admin\dashboard');

            }
            if(Auth::user()->is_admin == 0) {
                return redirect('user');
            }
         }

        return $next($request);
    }
}
