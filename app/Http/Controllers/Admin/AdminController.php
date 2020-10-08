<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

use App\reset_request;

class AdminController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.register');
        // return view('admin.test');
    }


    public function register(Request $request)
    {
        $this->validation($request);


        $request['password_confirmation'] = Hash::make($request['password_confirmation']);
        $request['password'] = Hash::make($request['password']);
        User::create($request->all());
        return redirect('/admin/dashboard')->with('creation_successfull', 'User successfully registerd');
    }

    public function validation($request)
    {
        $validate =  $request->validate([

            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' =>'required|confirmed|string|min:8',
            'company_name' =>'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'city' => 'required',
            'country'=> 'required',
            'gstn'=>'required|unique:customers,gstn|digits:15'
        ]);

        return $validate;
    }

    public function getusers()
    {
        $all_users = User::where('is_admin', 0)->get();


        return view('admin.main-tiles', ['data' => $all_users]);
    }

    public function allusers()
    {
        $all_users = User::where('is_admin', 0)->get();


        return view('admin.total-user', ['data' => $all_users]);
    }


    public function blockedusers()
    {
        $condition = ['is_admin'=>0, 'is_active'=>0];
        $blocked_users = User::where($condition)->get();
        return view('admin.blocked-user', ['data' => $blocked_users]);
    }

    public function activeusers()
    {
        $condition = ['is_admin'=>0, 'is_active'=>1];
        $active_users = User::where($condition)->get();
        return view('admin.active-user', ['data' => $active_users]);
    }


    public function updateuser_status($id)
    {
        $condition = ['id'=>$id];
        $status = User::where($condition)->get();


        if ($status[0]['is_active'] == 1) {
            User::where('id', $id)->update(['is_active' =>0]);
        } else {
            User::where('id', $id)->update(['is_active' =>1]);
        }
    }

    public function getuser($id)
    {
        $data = User::find($id);





        return view('admin.update-user', ['data' =>$data]);
    }




    public function search_result()
    {
        $users = QueryBuilder::for(User::class)
        ->allowedFilters([
            AllowedFilter::callback(
                'search',
                function (Builder $query, $value) {
                    $query->where('name', 'like', '%' . $value . '%')
                     ->orWhere('email', 'like', '%' . $value . '%')
                     ->where('is_admin', 0);
                }
            ),

            ])->get();


        return $users;
    }


    public function updateuser(Request $request)
    {
        $data = $request->input();

        $id = $data["id"];
        unset($data[$id]);

        if (array_key_exists("email", $data)) {
            $this->validate_update_email($request);
            User::find($id)->update($data);
            return json_encode($data);
        } else {
            $this->validate_update($request);
            User::find($id)->update($data);
            return json_encode($data);
        }
    }



    public function validate_update_email(Request $request)
    {
        $validate =  $request->validate([

            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users|max:255',

            'company_name' =>'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'city' => 'required',
            'country'=> 'required'
        ]);

        return $validate;
    }


    public function validate_update(Request $request)
    {
        $validate =  $request->validate(
            [

            'name' => 'required|string|max:50',


            'company_name' =>'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'city' => 'required',
            'country'=> 'required'
        ],
            [
            'mobile.min' => 'Contact Number Must be of 10 digits'
        ]
        );

        return $validate;
    }



    public function getall()
    {
        $conditions = ['is_admin'=>0, 'reset_request'=>1];
        $data =   User::where($conditions)->get();

        return view('admin.password_reset_requests', ['data'=>$data]);
    }



    public function password_reset_form($id)
    {
        $data = User::find($id);

        return view('admin.password_resetform', ['data'=>$data]);
    }





//
    public function password_reset(Request $request){

        $this->password_reset_validation($request);
        $email = $request->email;
        $condition = ['email'=>$email];

        $request['password_confirmation'] = Hash::make($request['password_confirmation']);
        $request['password'] = Hash::make($request['password']);

        User::where($condition)->update(['password'=>$request['password']]);

        User::where($condition)->update(['reset_request'=>0]);

        return redirect('/admin/dashboard')->with('status', 'Password successfully Updated For User');





    }




    public function password_reset_validation(Request $request)
    {
        $validate = $request->validate([

            'password' =>'required|confirmed|string|min:8',

        ]);

        return $validate;
    }

    public function search_user() {
        return view('admin.search-user');
    }
}
