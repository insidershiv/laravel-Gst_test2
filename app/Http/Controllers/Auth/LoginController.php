<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, $user)
    {


         //Auth::logoutOtherDevices($request->password); // will prevent multiple login

        // if($user->is_active == 0) {
        //     return redirect('/blocked_user');
        // }


        if($user->is_admin == 1) {


            return redirect('admin\dashboard');
        }
        if($user->is_admin == 0) {


            return redirect('user\dashboard');
        }
    }

    // public function logoutAllDevices(Request $request)
    // {
    //     \DB::table('sessions')
    //         ->where('user_id', \Auth::user()->id)
    //         ->where('id', '!=', \Session::getId())->delete();

    //     return redirect('/logged-in-devices');
    // }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('auth.login');
    }
}
