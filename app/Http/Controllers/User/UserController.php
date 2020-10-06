<?php

namespace App\Http\Controllers\User;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Inventory;
use App\Invoice;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    //


    public function dashboard(Request $request)
    {
        //  $request->session_destroy();
        $id = Auth::user()->id;

       $items =  Inventory::where('item_id', $id)->get();
       $item_count = $items->count();
      $sales_data =  Invoice::where('vendor_id', $id)->get(['subtotal', 'total_amount', 'tax']);

      $sales_amount = 0;
      $tax = 0 ;
      $total_amount = 0 ;


      foreach($sales_data as $sale_data) {
          $sales_amount = $sales_amount + $sale_data->subtotal;
          $tax  = $tax + $sale_data->tax;
            $total_amount = $total_amount + $sale_data->total_amount;
          
      }
     $todays_invoices = count(Invoice::where('vendor_id', $id)->whereDate('created_at', Carbon::today() )->get());
     $total_invoices = count(Invoice::where('vendor_id', $id)->get());

       

        return view('user.main-dashboard', ['item_count'=> $item_count, 'sales_amount'=> $sales_amount, 'total_tax'=>$tax, 'total_amount'=>$total_amount, 'todays_invoices'=>$todays_invoices, 'total_invoices'=>$total_invoices]);
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

        //Auth::logoutOtherDevices($password);
    }

    // public function logout() {
    //     session_unset();
    //     Auth::logout();
    //     //return redirect('login');
    // }


    public function get_user($id)
    {
        $user = User::where('id', $id)->get();
        return view('user.profile', ['user'=>$user]);
    }


    public function profile_update(Request $request)
    {
        $data = ($request->input());

        $id = $data["id"];
        unset($data[$id]);

        $this->validate_update($request);

        User::find($id)->update($data);



    }



    public function validate_update(Request $request)
    {

        $messages = [
            'number.min'=>'Contact Number must be 10 digits'
        ];




        $validate =  $request->validate(
            [

            'name' => 'required|string|max:50',
            'state'=> 'required|string|max:100',

            'company_name' =>'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'city' => 'required',
            'country'=> 'required',

        ],

        );

        return $validate;
    }


public function new_customer_form() {
    return view ('user.customer.new-customer');
}


public function create_customer(Request $request) {

    $vendor_id = Auth::user()->id;
   $request["vendor_id"] = $vendor_id;
    $this->validate_customer($request);
    Customer::create($request->all());
    return redirect('/user/dashboard')->with('creation_successfull', 'Customer Added Successfully');




}


public function validate_customer($request) {



    $validate =  $request->validate(
        [

        'name' => 'required|string|max:50',
        'state'=> 'required|string|max:100',
        'pincode' => 'required|numeric|digits:6',
        'company_name' =>'required',
        'mobile' => 'required|digits:10',
        'address' => 'required',
        'city' => 'required',
        'country'=> 'required',
        'email'=>'required|unique:customers,email'

    ],
    [
        'mobile.required'=>'Contact Number is Required',
        'mobile.digits' =>'Contact number must be of 10 digits'
    ]

    );

return $validate;

}


public function view_customers_list() {
$vendor_id = Auth::user()->id;
$customers = Customer::where('vendor_id', $vendor_id)->get()->sortBy('name');
return view('user.customer.customer-list', ['data'=>$customers]);
}



public function search_customer() {
    $customers = QueryBuilder::for(Customer::class)
    ->allowedFilters([
        AllowedFilter::callback(
            'search',
            function (Builder $query, $value) {
                $query->where('name', 'like', '%' . $value . '%')
                 ->orWhere('email', 'like', '%' . $value . '%');
            }
        ),

        ])->get();


    return $customers;
}



public function updatecustomer_data($id) {

    $customers = Customer::where('id', $id)->get();
    $customer = $customers[0];
    return view('user.customer.customer-update-info', ['customer'=>$customer]);


}


public function update_customer(Request $request) {

$data =  $request->input();



$id= $data["id"];

if(array_key_exists('update_check', $data)){

    unset($data[$id]);
    unset($data["update_check"]);

    unset($data["_token"]);
    $this->validate_customer($request);



}

else {
    unset($data[$id]);
    unset($data["email"]);
    unset($data["_token"]);

    $this->update_customer_validation($request);


}


Customer::where('id', $id)->update($data);

return redirect('user/dashboard');





}



public function update_customer_validation($request) {

    $validate =  $request->validate(
        [

        'name' => 'required|string|max:50',
        'state'=> 'required|string|max:100',
        'pincode' => 'required|numeric|digits:6',
        'company_name' =>'required',
        'mobile' => 'required|digits:10',
        'address' => 'required',
        'city' => 'required',
        'country'=> 'required',


    ],
    [
        'mobile.required'=>'Contact Number is Required',
        'mobile.digits' =>'Contact number must be of 10 digits'
    ]

    );

return $validate;

}


public function view_customer($id) {

    $vendor_id = Auth::user()->id;
    $conditons = ["id"=>$id, "vendor_id"=>$vendor_id];


   $customer =  Customer::where($conditons)->get();
   $customer = $customer[0];

   return view('user.customer.customer-details', ['customer'=>$customer]);
}





}
