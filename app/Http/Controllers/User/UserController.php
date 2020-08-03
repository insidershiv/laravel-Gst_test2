<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //


    public function dashboard(Request $request)
    {
        // $request->session_destroy();
        return view('user.main-dashboard');
    }

    public function show_form()
    {
        return view('user.update-password');
    }

    public function old_password_check(Request $request)
    {
        $old_password = $request->old_password ;
        $email = $request->email;


        $encrypted_password =  DB::table('users')->where('email', $email)->get(['password']);


        $array = json_decode(json_encode($encrypted_password), true);
        $encrypted_password = $array[0]["password"];



        if (Hash::check($old_password, $encrypted_password)) {
            // Right password
            $res = ["status"=>1];
            return json_encode($res);
        } else {
            // Wrong one
            $res = ["status"=>0];
            return json_encode($res);
        }
    }


    public function update_password(Request $request)
    {



        $this->password_match($request);
        $email = $request->email;
        $password = bcrypt($request->password);

        User::where('email', $email)->update(['password'=> $password]);
    }


    public function password_match(Request $request)
    {
        $validate = $request->validate([


            'password' =>'required|string|min:8',
            'confirm_password' => 'required|same:password'


        ]);

        return $validate;
    }

    public function logout_other_devices(Request $request)
    {
        $password = $request->password;

        Auth::logoutOtherDevices($password);
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
 }
