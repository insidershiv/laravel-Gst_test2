<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Billdetail;
use App\Billitem;
use App\Customer;
use App\Inventory;
use App\Invoice;
use App\Lastinvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class BillController extends Controller
{
    //



    public function select_customer() {
        $id = Auth::user()->id;
        $customers = Customer::where('vendor_id', $id)->get(['name','company_name'])->sortBy('name');
        
        //$customers = $customers->toArray();
        // $customers = array(
        //     0 => array(
        //         'cat' => 'Wood'
        //     ),
        //     1 => array(
        //         'cat' => 'Metal'
        //     ),
        // );


        
        //$companies = Customer::where('vendor_id', $id)->get('company_name')->sortBy('name');
        
        return view('user.bill.select-customer', ["customers"=>$customers]);
    }

    public function selected_customer_details(Request $request) {


        $name = $request['name'];
        $company_name = $request['company_name'];

        $conditions  = ['name' =>$name, 'company_name'=>$company_name];
        $customer =  Customer::where($conditions)->get();
        session()->put('selected_customer',$customer[0]);
        return json_encode($customer);



    }


    public function bill_additems() {
       $id =  Auth::user()->id;
       $items = Inventory::where('item_id', $id)->get();
       $customer = session('selected_customer');

       return view('user.bill.add-bill-items', ['items'=>$items, 'customer'=>$customer]);
    }

    public function stock_deduct(Request $request) {

        $item_name = $request["item_name"];
        
        $stock = $request["item_stock"];
        $item_stock  = Inventory::where('item_name', $item_name)->get('item_stock');
        $item_stock = $item_stock[0]["item_stock"];
       
        echo $stock;
        $stock = $item_stock - $stock ;
        Inventory::where('item_name', $item_name)->update(['item_stock'=>$stock]);


    }

    public function stock_readd(Request $request) {
        $item_name = $request["item_name"];
        $stock = $request["item_stock"];
        if(is_nan($stock)) {
            return;
        }
        $item_stock = Inventory::where('item_name', $item_name)->get('item_stock');
        $item_stock = $item_stock[0]["item_stock"];
        $stock = $item_stock + $stock;
        Inventory::where('item_name', $item_name)->update(['item_stock'=>$stock]);

    }

    public function update_invoice(Request $request) {
        $subtotal =     $request["subtotal"];
        $total_tax =    $request["total_tax"];
        $total_amount = $request["total_amount"];
        $customer_id =  $request["id"];
        $amount_words = $request["amount_words"];
        $vendor_id = Auth::user()->id;



        
       $data =  Lastinvoice::where('customer_id', $customer_id)->get();
       $date = new Carbon(); 
       $year = $date->year;
       if(count($data) == 0) {
      
        $invoice_id = $year . '-'. 1 ;

        $feed = ["customer_id"=>$customer_id, 'last_invoice'=>$invoice_id];
        Lastinvoice::create($feed);
        $invoice_data = ["subtotal"=>$subtotal, "tax"=>$total_tax, "total_amount"=>$total_amount, "customer_id"=>$customer_id, "vendor_id"=>$vendor_id, "invoice_id"=>$invoice_id, "amount_words"=>$amount_words];
        Invoice::create($invoice_data);        

        
       }else {

        $invoice_id = Lastinvoice::where('customer_id', $customer_id)->get('last_invoice');
        $invoice_id = $invoice_id[0];
        $temp =  $invoice_id["last_invoice"];
      
        $temp=  (explode("-",$temp));
        $temp = $temp[1];
        $temp = ++$temp;
        $invoice_id = $year . '-' . $temp;
        echo $invoice_id;

        $feed = ['last_invoice'=>$invoice_id];
        $invoice_data = ["subtotal"=>$subtotal, "tax"=>$total_tax, "total_amount"=>$total_amount, "customer_id"=>$customer_id, "vendor_id"=>$vendor_id, "invoice_id"=>$invoice_id, "amount_words"=>$amount_words];

          Lastinvoice::where('customer_id',$customer_id)->update($feed);
          Invoice::create($invoice_data); 

       }

       
    
       
       
            
    }

    public function viewall_bills() {
        return view('user.bill.view-bills');
    }

    public function view_lastbill($customer_id) {
        $vendor_id = Auth::user()->id;
       $last_invoice =  Lastinvoice::where('customer_id', $customer_id)->get('last_invoice');
       if(count($last_invoice) == 0 ) {
           return view('user.bill.view-savedbill', ['no_items'=>1]);
       }
       $last_invoice = $last_invoice[0]["last_invoice"];
       $bill_details = Billitem::where(['invoice_id'=>$last_invoice, 'vendor_id'=>$vendor_id, 'customer_id'=>$customer_id])->get();
       $bill_details = $bill_details;
       $customer = Customer::where('id', $customer_id)->get();
       $customer = $customer[0];
       $no_items = 0 ;
       $final_amounts = Invoice::where(['invoice_id'=>$last_invoice, 'vendor_id'=>$vendor_id])->get(['subtotal', 'tax', 'total_amount', 'amount_words']);
       if(count($final_amounts) ==0) {
       
        $no_items = 1 ;
       }else {
        $final_amounts = $final_amounts[0];
       }
      

       
     return view('user.bill.view-savedbill', ["bill_details"=>$bill_details, "invoice_id"=>$last_invoice, "customer"=>$customer, 'final_amounts'=>$final_amounts , 'no_items'=>$no_items]);
   
    }


    public function view_bill(Request $request, $id, $cus_id) {

        $vendor_id = Auth::user()->id;
        $temp = Billdetail::where('invoice_id',$id)->get('customer_id');
        if(count($temp) == 0 ){
            $no_items = 1;
            return view('user.bill.view-bill', ['no_items'=>$no_items]);
        }else {
            $no_items = 0 ;
        }

        if(session()->has('selected_customer')) {
            $cust_id = session()->get('selected_customer');
            $cust_id = $cust_id["id"];
        }

        // $customer_id = $temp[0];
        // $customer_id = $customer_id["customer_id"];

        $bill_details = Billitem::where(['invoice_id'=>$id, 'vendor_id'=>$vendor_id, "customer_id"=>$cus_id])->get();
        
        
       
        // $temp = Billdetail::where('invoice_id',$id)->get('customer_id');
        // $customer_id = $temp[0];
        // $customer_id = $customer_id["customer_id"];
       
         $customer = Customer::where('id', $cus_id)->get();
         $customer = $customer[0];
         //return view('user.bill.view-bill', ['customer'=>$customer]);

 
         $final_amounts = Invoice::where(['invoice_id'=> $id, 'vendor_id'=>$vendor_id, 'customer_id'=>$cus_id])->get(['subtotal', 'tax', 'total_amount', 'amount_words']);
          $final_amounts = $final_amounts[0];


          return view('user.bill.view-bill', ["bill_details"=>$bill_details, "invoice_id"=>$id, "customer"=>$customer, 'final_amounts'=>$final_amounts , 'no_items'=>$no_items]);


        // return view('user.bill.view-bill');
    }



    public function addto_billitems(Request $request, $id) {


        // $data = $request["bill_items"];
        $data = $request->input('bill_items');

        $obj =   ((json_decode($data)));
        $customer_id = $id;
        
        $vendor_id = Auth::user()->id;
        
        $invoice_id = Lastinvoice::where('customer_id', $customer_id)->get('last_invoice');
        $invoice_id = $invoice_id[0];
        $temp =  $invoice_id["last_invoice"];


         $length = count($obj);

         for($i = 0 ; $i <$length ; $i++) {
            $arr = (array)$obj[$i];
            $arr["vendor_id"] = $vendor_id;
            $arr["invoice_id"] = $temp;
            $arr["customer_id"] = $customer_id;
            Billitem::create($arr);
            
         }
       
      
       
    }


    public function addto_billdetails(Request $request, $id) {

        $customer_id = $id ;
        $amount  = $request["amount"];
        $customer_name = $request["customer_name"];
        $vendor_id = Auth::user()->id;
        $invoice_id = Lastinvoice::where('customer_id', $customer_id)->get('last_invoice');
        $invoice_id = $invoice_id[0];
        $temp =  $invoice_id["last_invoice"];
        $invoice_id = $temp;
        $data = ["customer_id"=>$customer_id, "vendor_id"=>$vendor_id, "amount"=>$amount, "customer_name"=>$customer_name, "invoice_id"=>$invoice_id];
        Billdetail::create($data);
        
        

    }


    public function get_customer_allbills($id) {


        $customer_id = $id ;
        $data = Billdetail::where('customer_id', $id)->get();
        if(count( (array)$data) == 0) {
            $no_data = 1;
        }else {
            $no_data = 0 ;
        }

        return view('user.bill.customer-allbills', ["data"=>$data, "no_data"=>$no_data]);
    }


    public function viewbill_date(Request $request) {

        $start_date = $request["start_date"];
        $end_date = $request["end_date"];
        
        if($start_date == '') {
            $start_date = date("y-m-d");
            $end_date = date("y-m-d");
        }
        $data = Billdetail::whereBetween('created_at', [$start_date , $end_date])->get();
        if(count( (array)$data) == 0) {
            $no_data = 1;
        }else {
            $no_data = 0 ;
        }

        for($i=0; $i<count($data); $i++ ) {
            $createdAt = Carbon::parse($data[$i]["created_at"]);
         
          $date  =  $createdAt->format('M d Y');
          $data[$i]["created"]=$date;
        }

        // $createdAt = Carbon::parse($data[0]["created_at"]);
        // $data = $createdAt->format('M d Y');
     
    

      
        return  $data;




    }

    public function getlast_invoice($id) {

        $invoice_id = Lastinvoice::where('customer_id', $id)->get('last_invoice');
        $invoice_id = $invoice_id[0];
        $temp =  $invoice_id["last_invoice"];
        $invoice_id = $temp;
        return $invoice_id;




    }

    public function gettodays_invoice() {
        $vendor_id = Auth::user()->id;
     $data =    Billdetail::where('vendor_id', $vendor_id)->whereDate('created_at', Carbon::today())->get();
        if(count($data) == 0) {
            $no_data = 1;
        }else {
            $no_data = 0 ;
        }

        return view('user.bill.todays-bill', ['no_data'=>$no_data, 'data'=>$data]);

    }

    




}


