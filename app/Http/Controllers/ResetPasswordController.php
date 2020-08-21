<?php

namespace App\Http\Controllers;

use App\reset_request;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    //

    public function __construct()
    {
        // if logged-in , user will be redirected to home if trying to access the url

        $this->middleware('guest');
    }


    public function password_reset_url() {
        return view('passwordrequest.forgot_password');
    }

    public function password_reset_request(Request $request) {


        $email = $request->email;
        $condition = ['email'=>$email, 'is_admin'=>0];

        $data = User::where($condition)->get();


        $length = count($data);


        if($length) {

            if($data[0]["reset_request"] == 0){

                User::where('email', $email)->update(['reset_request'=> 1]);
                $res = ["msg"=>'true'];
            }

            else {
                $res = ["msg"=>'queued'];
            }





            return json_encode($res);

        }else {

            $res = ["msg"=>false];

            return json_encode($res);
        }

    }

}
