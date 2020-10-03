<?php

namespace App\Http\Controllers;

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
        
        $companies = Customer::where('vendor_id', $id)->get('company_name')->sortBy('name');
        return view('user.bill.select-customer', compact('customers', 'companies'));
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
        $vendor_id = Auth::user()->id;



        
       $data =  Lastinvoice::where('customer_id', $customer_id)->get();
       $date = new Carbon(); 
       $year = $date->year;
       if(count($data) == 0) {
      
        $invoice_id = $year . '-'. 1 ;

        $feed = ["customer_id"=>$customer_id, 'last_invoice'=>$invoice_id];
        Lastinvoice::create($feed);
        $invoice_data = ["subtotal"=>$subtotal, "tax"=>$total_tax, "total_amount"=>$total_amount, "customer_id"=>$customer_id, "vendor_id"=>$vendor_id, "invoice_id"=>$invoice_id];
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
        $invoice_data = ["subtotal"=>$subtotal, "tax"=>$total_tax, "total_amount"=>$total_amount, "customer_id"=>$customer_id, "vendor_id"=>$vendor_id, "invoice_id"=>$invoice_id];

          Lastinvoice::where('customer_id',$customer_id)->update($feed);
          Invoice::create($invoice_data); 

       }

       
    
       
       
            
    }

    public function viewall_bills() {
        return view('user.bill.view-bills');
    }

    public function view_lastbill($id) {
       $last_invoice =  Lastinvoice::where('customer_id', $id)->get('last_invoice');
       echo $last_invoice;
    }




}


