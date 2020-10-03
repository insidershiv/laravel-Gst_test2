@extends('layouts.dashboard')

@section('title', 'Add Items | BIll Section')

@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <div class="row ml-1">
        <div class="col-12 col-md-4 col-lg-4 card border-left-orange p-2 mb-5 mb-md-0" style="background: turquiose">

            <div class="row">
                <div class="col-5 col-sm-5 col-md-5 col-lg-5 font-responsive text-primary">
                    <p>Customer:</p>
                </div>
                <div class="col-5 col-sm-5 col-md-5 col-lg-5 font-responsive text-capitalize text-secondary">
                    {{ session()->get('selected_customer')['name'] }}
                </div>

            </div>
            <div class="row">
                <div class="col-5 col-sm-5 col-md-5 col-lg-5 font-responsive text-primary">Company:</div>
                <div class="col-5 col-sm-5 col-md-5 col-lg-5 font-responsive text-capitalize text-secondary">
                    {{ session()->get('selected_customer')['company_name'] }}
                </div>

            </div>

        </div>

        <div class="offset-md-1 col-12 col-md-7 col-lg-7 card border-left-voilet">

            <div class="row">
                <div class="col-md-6 col-lg-6">
                 <div class="row">  
                <div class="col-5 col-md-7 col-lg-6 font-responsive text-primary">Taxable Amount :</div>
                <div class="col-5  col-md-5 col-lg-6 font-responsive text-capitalize text-info">
                   <span id="amount">0</span> 
                </div>
            </div> 
            </div>

             
                   <div class="col-md-6 col-lg-6">
                   <div class="row">
                    <div class="col-5 col-sm-5 col-md-5 col-lg-3 font-responsive text-primary">Total Tax :</div>
                    <div class="col-5 col-sm-5 col-md-5 col-lg-3 font-responsive text-capitalize text-info">
                        <span id="total-tax">0</span>
                    </div>
                </div>
            </div>
                

            </div>

            <div class="row">
              
            <div class="col-md-12 col-lg-12">
                <div class="row">
                <div class="col-5 col-sm-5 col-md-5 col-lg-3 font-responsive text-danger">Total Payable Amount :</div>
                <div class="col-5 col-sm-5 col-md-6 col-lg-6 font-responsive text-capitalize text-danger">
                    <span id="total-payable-amount">0</span>
                </div>
            </div>
            </div>
        </div>

        </div>


    </div>


    <div class="container-fluid no-gutters mt-5">


        <div class="row">


            <div class="col-8 col-md-3 col-lg-3 mb-4 mb-md-0">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-2 font-responsive d-flex align-items-center text-primary">
                        ITEM
                    </div>
                    <div class="col-md-10">
                        <input type="text" placeholder="Start Typing Item" class="form-control" id="item"
                            onclick="addautocomplete(this)">
                    </div>
                </div>
            </div>

            <div class="col-8 col-md-3 col-lg-2  mb-4 mb-md-0">
                <div class="row">
                    <div class="col-4 col-sm-6 col-md-2 font-responsive d-flex align-items-center text-primary">
                        Rate
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="Rate" class="form-control font-responsive" readonly id="item_rate">
                    </div>
                </div>
            </div>
            <div class="col-8 col-md-3 col-lg-2  mb-4 mb-md-0" hidden id="qty">
                <div class="row ">
                    <div class="col-4 col-sm-6 col-md-2 font-responsive d-flex align-items-center text-primary" id="qty-div">
                        Qty
                    </div>
                    <div class="col-md-8">
                        <input type="number" placeholder="QTY" class="form-control font-responsive" id="item_qty" value="1">
                        <span class="invalid-feedback" role="alert">
                            <strong> <small id="qty-message">Quantity cannot exceed Stock</small> </strong>
                        </span>
                    </div>
                </div>
            </div>


            @if (Auth::user()->state == session()->get('selected_customer')['state'])
                <div class="col-8 col-md-1 col-lg-1 mb-4 mb-md-0 ml-0 mr-0 d-flex align-items-center" id="sgst-div">
                    <div class="row">
                        <div class="col-4 col-sm-6 col-md-7 font-responsive  text-primary">
                            SGST
                        </div>
                        <div class="col-md-5 font-responsive">
                            <span id="sgst">0%</span>
                        </div>
                    </div>
                </div>

                <div class="col-8 col-md-1 col-lg-1  mb-4 mb-md-0 ml-0 d-flex align-items-center" id="cgst-div">
                    <div class="row">
                        <div class="col-4 col-sm-6 col-md-7 font-responsive  text-primary">
                            CSGST
                        </div>
                        <div class="col-md-5 font-responsive" id="cgst">

                            <span id="cgst">0%</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-8 col-md-4 col-lg-2  mb-4 mb-md-0 d-flex align-items-center">
                    <div class="row">
                        <div class="col-4 col-sm-6 col-md-6 font-responsive  text-primary" id="igst-div">
                            IGST
                        </div>
                        <div class="col-md-6">
                            <span id="igst">0%</span>
                        </div>
                    </div>
                </div>
            @endif


            <div class="col-md-2 d-flex align-items-center">
                
            <div class="row">
            
                <div class="col-md-6 font-responsive text-primary">Amount:</div>
                <div class="col-md-6 font-responsive"><span id="rowitem_local_amount">0</span></div>
            
            </div>    
               
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-md-2 mt-5 col-lg-2 d-flex align-items-center" id="add-btn-div">

                <button class="btn btn-success btn-block font-responsive" id="add-item" onclick="add_item()">Add Item</button>

            </div>

        </div>

     



    </div>

  

    <div class="container text-right">
        <div>
            {{-- <button class="btn btn-warning" onclick="location.href='/user/bill/generateinvoice'">Generate Bill</button> --}}
            <button class="btn btn-warning" onclick="goto_bill()">Generate Bill</button>
        </div>
    </div>
    
    <div class="container-fluid mt-5">
        <div class="table-responsive card">

            <!--Table-->
            <table class="table mb-0">
    
              <!--Table head-->
              <thead>
                <tr>
                  <th class="text-warning">#</th>
                
                  <th class="th-lg">ITEM NAME</th>
                  <th class="th-lg">RATE</th>
    
                  <th class="th-lg">QTY</th>
                  <th class="th-lg">Subtotal</th>
                  @if (Auth::user()->state == session()->get('selected_customer')['state'])
                  <script>
                      var samestate = 1;
                  </script>
                  <th class="th-lg">SGST(%)</th>
                  <th class="th-lg">CGST(%)</th>

                  @else
                  <th class="th-lg">IGST</th>
                  <script>
                      var samestate = 0 ;
                  </script>

                  @endif
                  <th class="th-lg">Total</th>
                </tr>
              </thead>
              <!--Table head-->
    
              <!--Table body-->
              <tbody id="tbody">
    
               
                {{-- <tr class="table-row" id="row-1">
                    <th id="item-1" style="cursor: pointer"  onclick="delete_row(this)"><i class="fas fa-trash text-danger"></i></th>
                    <td>ak </td>
                    <td>ak </td>

                    <td>ak </td>
                    <td>ak </td>
                    <td>ak </td>
                    <td class="small"><p class="small pb-0 mb-0">3230</p><p class="small">@25%</p></td>
                    <td class="small"><p class="small mb-0 pb-0">3230</p><p class="small">@25%</p></td>
                </tr> --}}
              </tbody>
            </table>
        </div>
    </div>
        





    <script>
         var items = {!! $items !!};
         var customer = {!! $customer !!};
        console.log(items);
        console.log(customer);
        var data = [];
        for (i = 0; i < items.length; i++) {
            data[i] = (items[i]["item_name"]);
        }

        console.log(data);

        source = data;




        function autocompletelistner(event, ui) {
            if (ui.content.length === 0) {
               

            } else {
               


            }
        }

        item_stock = -1;
        amount = 0 ;
        item_type = '';
        pname = '';
        sgst = -1;
        cgst = -1;
        content = {};
        product_rate = -1;
        sgst_row = -1;
        cgst_row  = -1;
        selected_qty = 1;
        total_taxable_amount = 0;
        total_tax = 0;
        total_payable_amount = 0;
        item_hsn = '';
        

        function selecteditem(event, ui) {
            // item has been selected from drop down (autocomplete)

            pname = ui.item.label;
            item_stock = -1;


            for (i = 0; i < items.length; i++) {
                if (pname == items[i]["item_name"]) {
                    content= items[i];
                    break;
                }
            }
                    rate = content["item_price"];
                    item_exemption = content["item_exemption"];
                    item_type = content["item_type"];
                    item_hsn = content["item_hsn_sac"];
                    $('#item_rate').val(rate);
                   // $('#amount').text(rate);                    


                    if (item_type == 'Product') {
                        $('#qty').removeAttr('hidden');
                        item_stock = content["item_stock"];

                    }

                    if (item_type == 'Service') {
                        $('#qty').attr('hidden', true);
                    }

                    if (item_exemption == 0) {
                        tax_slab = content["item_tax_slab"];
                        sgst = tax_slab / 2;
                        sgst_row = sgst;
                        cgst_row = sgst_row;
                        sgst = sgst + "%";
                        cgst = tax_slab / 2;
                        cgst = cgst + '%';
                        igst = tax_slab + '%';
                        $('#sgst').text(sgst);
                        $('#cgst').text(cgst);
                        $('#igst').text(igst);

                    }
                    showrow_local_amount(selected_qty);
                   
                
            }


          function  showrow_local_amount(selected_qty) {
              if(item_type=='Service'){
            if(sgst_row != -1 && cgst_row != -1) {
                row_local_amount = rate;
                row_local_tax = (tax_slab*rate)/100;
                row_local_amount = row_local_amount + row_local_tax;
                row_local_amount = Math.floor(row_local_amount);
                $('#rowitem_local_amount').text(row_local_amount);
            }
              }

              if(item_type == 'Product') {
                if(sgst_row != -1 && cgst_row != -1) {
                row_local_amount = rate;
                row_local_amount = rate * selected_qty;
                row_local_tax = (tax_slab*rate)/100;
                row_local_amount = row_local_amount + row_local_tax;
                row_local_amount = Math.floor(row_local_amount);
                $('#rowitem_local_amount').text(row_local_amount);
            }
              }
          }


           

        
        amount_without_tax = $('#amount').text();

        qty_exceed = 0 ;

        $('#item_qty').on({
            "keyup": function() {
               entered_stock = $('#item_qty').val();
               if(entered_stock == '' || entered_stock <= 0) {
                   entered_stock = 1;
                   $('#item_qty').val(1);
               }
               if(item_stock != -1 && entered_stock <= item_stock) {

               $('#item_qty').removeClass('is-invalid');
               $('#qty-div').addClass('align-items-center');
               $('#sgst-div').addClass('align-items-center');
               $('#cgst-div').addClass('align-items-center');
               $('#qty-div').removeClass('mt-md-2');
               $('#sgst-div').removeClass('mt-md-2');
               $('#cgst-div').removeClass('mt-md-2');
             
              // amount_calculate(amount_without_tax);
              qty_exceed = 0 ;



               }
               if(item_stock != -1 && entered_stock > item_stock) {
                $('#qty-message').text('Quantity cannot exceed Stock');
                $('#item_qty').addClass('is-invalid');
                $('#qty-div').removeClass('align-items-center');
                $('#sgst-div').removeClass('align-items-center');
                $('#cgst-div').removeClass('align-items-center');
                $('#qty-div').addClass('mt-md-2');
                $('#sgst-div').addClass('mt-md-2');
                $('#cgst-div').addClass('mt-md-2');

                qty_exceed = 1;

               }


               showrow_local_amount(entered_stock);


            }

        });





      

        
        function amount_calculate(amount_without_tax) {
            console.log(amount_without_tax);
            
            product_qty = $('#item_qty').val();
            console.log(product_qty);
            if(product_qty == '') {
                product_qty = 1 ;
            }
          
            product_qty = parseInt(product_qty);
            console.log(product_qty);
           
            rate = $('#item_rate').val();
            rate = parseInt(rate);
            console.log(rate);

          

            amount_without_tax = parseInt(amount_without_tax);
            console.log(amount);

            product_rate = rate * product_qty;
            amount = amount_without_tax + product_rate;
            console.log(amount);
           // $('#amount').text(amount);

            total_taxable_amount = total_taxable_amount + product_rate;
            console.log(total_taxable_amount);
            $('#amount').text(total_taxable_amount);
            
            total_tax = total_tax + Math.floor((tax_slab*product_rate)/100);
            $('#total-tax').text(total_tax);
            total_payable_amount =total_taxable_amount + total_tax;
            $('#total-payable-amount').text(total_payable_amount);
            localStorage.setItem('taxable_amount', total_taxable_amount);
            localStorage.setItem('total_tax', total_tax);
            localStorage.setItem('total_payable', total_payable_amount);



        }


        var table = '';

        count = 0;
        bill_row_count = 0 ;
      
        var bill_items = {};

        var billdescription = '';
        arr = {};

        function add_item() {
            if(pname == '') {
                swal({
                    title: "Please Select Item First",

                    icon: "warning",
                    button: "Ok",
                });
                return;
            }

            if(qty_exceed ==1) {
                swal({
                    title: "Stock Limit Exhausted",

                    icon: "warning",
                    button: "Ok",
                });
                return;
            }
            count++;
            row_total = 0;
            var add_items_list = {};

            
            amount_calculate(amount_without_tax);
            item_name = $('#item').val();
            add_items_list["item_name"] = item_name;
            //console.log(add_items_list);
            if(item_type == 'Product'){
                product_qty = $('#item_qty').val();
                console.log(product_qty);
                $.ajax({
                    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                    type: "POST",
                    url: "/user/stock/deduct",
                    data: {"item_name":item_name, "item_stock":product_qty},
                   
                    success: function (response) {
                        console.log("success");
                    }
                });

                qty_row = '<td>' + product_qty + '</td>';
            }else {
                qty_row = '<td>N/A</td>';
            }
            
            
            if(samestate == 1){
                console.log(sgst);
                table_sgst = sgst.slice(0,-1);
                table_cgst = cgst.slice(0,-1);
              
              
                if(item_type == 'Product') {
                    sgst_amount = ((table_sgst)* rate * product_qty)/100;
                }else {
                    sgst_amount  =  ((table_sgst)* rate)/100;
                }
                cgst_amount = sgst_amount;

                row_total = product_rate + sgst_amount + cgst_amount;
                row_total = Math.floor(row_total);


            

var myvar = '<tr class="table-row" id="row-' + count   + '">'+
'                    <th id="item-1" style="cursor: pointer"  onclick="delete_row(this)"><i class="fas fa-trash text-danger"></i></th>'+

'                    <td class="small text-capitalize">'+ pname   +'</td>'+
''+
'                    <td class="small">'+ rate+ '</td>'+qty_row+

'                    <td class="small">'+ product_rate  +'</td>'+
'                    <td class="small"><p class="small pb-0 mb-0">'+ sgst_amount  +'</p><p class="small">@' +  sgst +'</p></td>'+
'                    <td class="small"><p class="small mb-0 pb-0">'+ cgst_amount +'</p><p class="small">@' + cgst +'</p></td>'+
'                    <td class="small">'+ row_total  +'</td>'+
'                </tr>';



    $('#tbody').append(myvar);
            }



            if(samestate == 0){
               
                table_sgst = sgst.slice(0,-1);
                table_cgst = cgst.slice(0,-1);
                sgst_amount = ((table_sgst)* rate)/100;
                cgst_amount = sgst_amount;
                igst_amount = Math.floor((tax_slab * product_rate)/100);

                row_total = product_rate + sgst_amount + cgst_amount;
                row_total = Math.floor(row_total);


            

var myvar = '<tr class="table-row" id="row-' + count   + '">'+
'                    <th id="item-'+ count + '"' + 'style="cursor: pointer"  onclick="delete_row(this)"><i class="fas fa-trash text-danger"></i></th>'+

'                    <td class="small text-capitalize">'+ pname   +'</td>'+
''+
'                    <td class="small">'+ rate+ '</td>'+qty_row+

'                    <td class="small">'+ product_rate  +'</td>'+
'                    <td class="small"><p class="small pb-0 mb-0">'+ igst_amount  +'</p><p class="small">@' +  tax_slab +'%</p></td>'+

'                    <td class="small">'+ row_total  +'</td>'+
'                </tr>';



    $('#tbody').append(myvar);
            }

            console.log(count);
            console.log(bill_item);
            var bill_item   = [];

            bill_item["name"] = item_name;
            bill_item["price"] = rate;
            bill_item["hsn_sac"] = item_hsn;

            if(item_type == 'Product') {
                bill_item["qty"] = qty_row;
            }else {
                bill_item["qty"] = 'N/A';
            }

           
            bill_item["product_amount"] = product_rate;
            

            bill_items[bill_row_count] = bill_item;
            localStorage.setItem('bill_items', JSON.stringify(bill_items));
            bill_row_count++;

          

            


            //console.log(bill_items);


            if(samestate == 0) {

                

                row_item =   '<div class="container no-gutters hrline-bottom" id="row-' +count  +'">'+
'    '+
'        <div class="row no-gutters ">'+
'    '+
'            <div class="col-md-1 section-item-border no-gutters text-center">'+
'    '+
'                    {{-- <span class="bill-item"></span> --}}'+
'    '+
'                    <div class="row">'+
'    '+
'                      '+
'    '+
'    '+
'                        <div class="col-md-6 text-center">'+
'                            <span class="bill-item">1</span>'+
'                            </div>'+
'    '+
'                    </div>'+
'    '+
'    '+
'    '+
'    '+
'            </div>'+
'    '+
'            <div class="col-md-3 bill-item section-item-border text-center p-0" id="description">'+
'    {{-- item name --}}'+
'               <input type="text" class="w-100 p-0 no-border text-wrap text-capitalize"  value="' + item_name + '">'+
'              '+
'    '+
'            </div>'+
'    '+
'            <div class="col-md-1 pl-1 bill-item section-item-border text-center">'+
'                {{-- HSN --}}'+
'                <input type="text" class="w-100 p-0 no-border text-wrap text-center" value = "'+ item_hsn+'">'+
'    '+
'            </div>'+
'    '+
'            <div class="col-md-1 pl-1 bill-item section-item-border text-center">'+
'    {{-- QTY --}}'+
'                <input type="text" class="w-100 p-0 no-border text-wrap text-center"  value="' + product_qty +  '">'+
'    '+
'            </div>'+
'    '+
'            <div class="col-md-1 pl-1 bill-item section-item-border  text-center">'+
'    {{-- Rate --}}'+
'                <input type="text" class="w-100 p-0 no-border text-wrap text-center" readonly value="'+  rate + '">'+
'            </div>'+
'    '+
'            <div class="col-md-4 pl-0 bill-item section-item-border text-center">'+
'    '+
'    '+
'    '+
'                <div class="row h-100">'+
'    '+
'    '+

'    '+
'                <div class="col h-100">'+
'                    <span class="text-break">'+ igst_amount+   '<span class="small">'  +  '    @ ' + tax_slab + '%' +  '</span>' +   '</span>'+
'                </div>'+
'    '+
'            </div>'+
'            </div>'+
'    '+
'    '+
'    '+
'    '+
'    '+
'    '+
'            <div class="col-md-1 pl-1 bill-item  text-center">'+
'    '+
'                <span class="text-break">'+  row_total +'</span>'+
'    '+
'            </div>'+
'    '+
'        </div>'+
'    '+
'    </div>';

billdescription  = billdescription + row_item;

arr[count] = row_item;


 }  else {







        row_item =   '<div class="container no-gutters hrline-bottom" id="row-'+ count +'">'+
'    '+
'        <div class="row no-gutters ">'+
'    '+
'            <div class="col-md-1 section-item-border no-gutters text-center">'+
'    '+
'                    {{-- <span class="bill-item"></span> --}}'+
'    '+
'                    <div class="row">'+
'    '+
'                      '+
'    '+
'    '+
'                        <div class="col-md-6 text-center">'+
'                            <span class="bill-item">1</span>'+
'                            </div>'+
'    '+
'                    </div>'+
'    '+
'    '+
'    '+
'    '+
'            </div>'+
'    '+
'            <div class="col-md-3 bill-item section-item-border text-center p-0" id="description">'+
'    {{-- item name --}}'+
'               <input type="text" class="w-100 p-0 no-border text-wrap text-capitalize" id="name-1" value="' + item_name + '">'+
'              '+
'    '+
'            </div>'+
'    '+
'            <div class="col-md-1 pl-1 bill-item section-item-border text-center">'+
'                {{-- HSN --}}'+
'                <input type="text" class="w-100 p-0 no-border text-wrap text-center" id="hsn-1" value = "'+ item_hsn+'">'+
'    '+
'            </div>'+
'    '+
'            <div class="col-md-1 pl-1 bill-item section-item-border text-center">'+
'    {{-- QTY --}}'+
'                <input type="text" class="w-100 p-0 no-border text-wrap text-center" id="qty-1" value="' + product_qty +  '">'+
'    '+
'            </div>'+
'    '+
'            <div class="col-md-1 pl-1 bill-item section-item-border  text-center">'+
'    {{-- Rate --}}'+
'                <input type="text" class="w-100 p-0 no-border text-wrap text-center" readonly id="rate-1" value="'+  rate + '">'+
'            </div>'+
'    '+
'            <div class="col-md-4 pl-0 bill-item section-item-border text-center">'+
'    '+
'    '+
'    '+
'                <div class="row h-100">'+
'    '+
'    '+
'                <div class="col-md-6 section-item-border">'+
'                    <span>'+ sgst_amount + '<span class="small">' + '    @ ' + sgst + '</span>' + '</span><br>'+
'                </div>'+
'    '+
'                <div class="col-md-6 h-100">'+
'                    <span class="text-break">'+ sgst_amount+   '<span class="small">'  +  '    @ ' + cgst +  '</span>' +   '</span>'+
'                </div>'+
'    '+
'            </div>'+
'            </div>'+
'    '+
'    '+
'    '+
'    '+
'    '+
'    '+
'            <div class="col-md-1 pl-1 bill-item  text-center">'+
'    '+
'                <span class="text-break">'+  row_total +'</span>'+
'    '+
'            </div>'+
'    '+
'        </div>'+
'    '+
'    </div>';

arr[count] = row_item ;
billdescription = billdescription + row_item;


  }
  console.log(arr);

var word = convertNumberToWords(total_payable_amount);
localStorage.setItem('amount_word', word);

//console.log(billdescription);

//console.log(localStorage.getItem('bill-description-list'));

            
            
            $('#item').val('');
            $('#item_rate').val('');
            $('#qty').attr('hidden', true);
            $('#sgst').text('0%');
            $('#cgst').text('0%');
            $('#rowitem_local_amount').text(0);
            $('#igst').text('0%');
            $('#item_qty').val(1);

        item_stock = -1;
        amount = 0 ;
        item_type = '';
        pname = '';
        sgst = -1;
        cgst = -1;
        content = {};
        product_rate = -1;
        sgst_row = -1;
        cgst_row  = -1;
        selected_qty = 1;


        }


        function delete_row(event) {
            id = event.id ;
            cid = id.split('-');
            id = cid[1];
            id = String(id);
            console.log(id);

            delete arr[id];
            $('#row-' + id).remove();
            console.log(arr);
           product_name = ( event.parentNode.childNodes[3].outerText);
          qty =   (event.parentNode.childNodes[6].innerText);

          $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
              type: "POST",
              url: "/user/stock/readd",
              data: {"item_name":product_name, "item_stock":qty}, 
          
              success: function (response) {
                  console.log("success");
              }
          });

        }



        function addautocomplete(obj) {
            $(obj).autocomplete({
                source,
                response: autocompletelistner,
                select: selecteditem
            });
            // $(obj).keyup(showproductbtn);

        }

        function goto_bill() {
        var bills = '';
for(var propt in arr){
    
          bills = arr[propt] + bills;
}

 var id = (customer["id"]);

$.ajax({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: "POST",
    url: "/user/update/invoice",
    data: {"subtotal":total_taxable_amount, "total_tax":total_tax, "total_amount":total_payable_amount, "id":id},
    
    success: function (response) {
        console.log("success");
    }
});

localStorage.setItem('bill-description-list', bills);

location.href = '/user/bill/generateinvoice';


        }

        function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    return words_string;
}



    </script>





@endsection
