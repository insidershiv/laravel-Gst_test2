<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;

class InventoryController extends Controller
{
    //


 
    public function create_inventory(Request $request) {
       

        $id = Auth::user()->id;
        $request['item_id'] = $id;
        $item_type = $request['item_type'];
        $item_tax_slab = $request['item_tax_slab'];
        //$item_hsn_sac = $request['item_hsn_sac'];
        

        if($request['item_exemption'] == 'true') {
            $request['item_exemption'] = 1;
        }

        if($item_tax_slab == 'Exempt') {
            $request['item_tax_slab']= 0;
        }

        if($item_type == 'Product'){
            if($item_tax_slab == 'Exempt') {
                $this->validate_inventory_exempt($request);

            }else {
                $this->validate_inventory($request);
            }
       
        }else {

           if($item_tax_slab == 'Exempt') {
                $this->validate_inventory_service_exempt($request);

            }else {
                $this->validate_inventory_service($request);
            }




        }

       
        Inventory::create($request->all());



    }





    public function validate_inventory($request) {
        $validate =  $request->validate(
            [
    
            'item_name' => 'required|string|max:50',
            'item_type'=> 'required|string|max:100',
            'item_price' => 'required|numeric',
            'item_stock' =>'required|numeric',
            'item_hsn_sac' => 'required|digits:6|numeric',
            'item_tax_slab' => 'required',
            
            
    
    
        ],
        [
            'item_stock.required'=>'Stock is Required',
            'item_hsn_sac.digits' =>'HSN/SAC Must be 6 Digits',
            'item_tax_slab' =>'tax slab is required',

        ]
    
        );
    
    return $validate;

    }




    public function validate_inventory_exempt($request) {
        $validate =  $request->validate(
            [
    
            'item_name' => 'required|string|max:50',
            'item_type'=> 'required|string|max:100',
            'item_price' => 'required|numeric',
            'item_stock' =>'required',
            'item_hsn_sac' => 'required|digits:6|numeric',
            'item_tax_slab' => 'required',
            'item_exemption_reason'=>'required'
            
            
    
    
        ],
        [
            'item_stock.required'=>'Stock is Required',
            'item_hsn_sac.digits' =>'HSN/SAC Must be 6 Digits',
            'item_tax_slab' =>'tax slab is required',
            'item_exemption_reason'=>'Please Give Exemption Reason'

        ]
    
        );
    
    return $validate;

    }




    public function validate_inventory_service($request) {
        $validate =  $request->validate(
            [
    
            'item_name' => 'required|string|max:50',
            'item_type'=> 'required|string|max:100',
            'item_price' => 'required|numeric',
            'item_hsn_sac' => 'required|digits:6|numeric',
            'item_tax_slab' => 'required'
         
        ],
        [
           
            'item_hsn_sac.digits' =>'HSN/SAC Must be 6 Digits',
            'item_tax_slab' =>'tax slab is required',

        ]
    
        );
    
    return $validate;

    }








    public function validate_inventory_service_exempt($request) {
        $validate =  $request->validate(
            [
    
            'item_name' => 'required|string|max:50',
            'item_type'=> 'required|string|max:100',
            'item_price' => 'required|numeric',
            'item_hsn_sac' => 'required|digits:6|numeric',
            'item_tax_slab' => 'required',
            'item_exemption_reason'=>'required'

         
        ],
        [
            'item_exemption_reason'=>'Please Give Exemption Reason',
            'item_hsn_sac.digits' =>'HSN/SAC Must be 6 Digits',
            'item_tax_slab' =>'tax slab is required',

        ]
    
        );
    
    return $validate;

    }

    public function view_inventory() {
        $item_id  = Auth::user()->id;
        $conditions = ['item_id'=>$item_id];
       $items =  Inventory::where($conditions)->get()->sortBy('item_name');

        return view('user.inventory.inventory-list', ['items'=>$items]);
    }


    public function view_products() {
        $item_id  = Auth::user()->id;
        $conditions = ['item_type'=>'Product', 'item_id'=>$item_id];
       $products =  Inventory::where($conditions)->get()->sortBy('item_name');

        return view('user.inventory.inventory-productlist', ['products'=>$products]);
    }


    public function view_services() {
        $item_id  = Auth::user()->id;
        $conditions = ['item_type'=>'Service', 'item_id'=>$item_id];
       $services =  Inventory::where($conditions)->get()->sortBy('item_name');

        return view('user.inventory.inventory-servicelist', ['services'=>$services]);
    }


    public function delete_product($id) {
        $item_id = Auth::user()->id;
        $conditions = ['id'=>$id, 'item_id'=>$item_id];
        Inventory::where($conditions)->delete();
        

    }


    public function delete_service($id) {
        $item_id = Auth::user()->id;
        $conditions = ['id'=>$id, 'item_id'=>$item_id];
        Inventory::where($conditions)->delete();
    }


    public function update_item(Request $request, $id) {

        $data = $request->input();
       
        // return $data;

        $item_type = $request['item_type'];
        $item_tax_slab = $request['item_tax_slab'];

        if($request['item_exemption'] == 'true') {
            $data['item_exemption'] = 1;
        }

        if($item_tax_slab == 'Exempt') {
            $data['item_tax_slab']= 0;
        }

        if($item_type == 'Product'){
            if($item_tax_slab == 'Exempt') {
                $this->validate_inventory_exempt($request);

            }else {
                $this->validate_inventory($request);
            }
       
        }else {

           if($item_tax_slab == 'Exempt') {
                $this->validate_inventory_service_exempt($request);

            }else {
                $this->validate_inventory_service($request);
            }




        }
        Inventory::where('id', $id)->update($data);




    }

    public function update_form($id) {
        $item_id = Auth::user()->id;
        $conditions = ['item_id'=>$item_id, 'id'=>$id];
        
        $products =  Inventory::where($conditions)->get();
        $product = $products[0];
        return view('user.inventory.inventory_updateform', ['product'=>$product]);

    }
    

    public function search_product() {
        
        $products = QueryBuilder::for(Inventory::class)
        ->allowedFilters([
            AllowedFilter::callback(
                'search',
                function (Builder $query, $value) {$id = Auth::user()->id;
                    $query->where('item_name', 'like', '%' . $value . '%')
                    ->defaultSort('item_name')
                    ->where('item_id', $id)
                    ->where('item_type', 'Product');
                    
                }
            ),

            ])->get();


        return $products;
    }


    public function search_service() {
        
        $services = QueryBuilder::for(Inventory::class)
        ->allowedFilters([
            AllowedFilter::callback(
                'search',
                function (Builder $query, $value) {$id = Auth::user()->id;
                    $query->where('item_name', 'like', '%' . $value . '%')
                    ->defaultSort('item_name')
                    ->where('item_id', $id)
                    ->where('item_type','Service');
                    
                }
            ),

            ])->get();


            

        return $services;
    }


    public function search_inventory() {
        $items = QueryBuilder::for(Inventory::class)
        ->allowedFilters([
            AllowedFilter::callback(
                'search',
                function (Builder $query, $value) {$id = Auth::user()->id;
                    $query->where('item_name', 'like', '%' . $value . '%')
                    ->defaultSort('item_name')
                    ->where('item_id', $id);
                    
                    
                }
            ),

            ])->get();


        return $items;
    }



public function additem_form() {
    
    return view('user.inventory.additem-form');
}


public function inventory() {

    $item_id = Auth::user()->id;

    $inventory = Inventory::where('item_id', $item_id)->get();
    $inventory_count = count($inventory);

    $product = Inventory::where(['item_type'=>'Product', 'item_id'=>$item_id])->get();
    $product_count = count($product);
    $service = Inventory::where(['item_type'=>'Service', 'item_id'=>$item_id])->get();
    $service_count  = count($service);

    return view('user.inventory.inventory', ['inventory_count'=>$inventory_count, 'product_count'=>$product_count, 'service_count'=>$service_count]);


}


public function print(Request $request) {
    $data = $request["data"];
    echo $data;
    // $pdf = App::make('snappy.pdf.wrapper');
    // $pdf->loadView('user.bill.generateinvoice');
    // return $pdf->inline();
}





}
