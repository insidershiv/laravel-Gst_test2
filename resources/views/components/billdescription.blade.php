
<div class="container p-0" id="billing">
    <div class="container no-gutters hrline-bottom">
    
        <div class="row no-gutters">
    
            <div class="col-md-1 section-item-border no-gutters text-center">
    
                    <span class="section-heading">#</span>
    
            </div>
    
            <div class="col-md-3 pl-1 section-heading section-item-border text-center">
    
                <span>Item & Description</span>
    
            </div>
    
            <div class="col-md-1 pl-1 section-heading section-item-border text-center">
    
                <span>HSN/SAC</span>
    
            </div>
    
            <div class="col-md-1 pl-1 section-heading section-item-border text-center">
    
                <span>QTY</span>
    
            </div>
    
            <div class="col-md-1 pl-1 section-heading section-item-border  text-center">
    
                <span>Rate</span>
    
            </div>
    
            <div class="col-md-4 pl-0 section-heading section-item-border text-center" id="tax">
    
                <div class="hrline-bottom m-0 p-0">
                    
                  <span>Tax</span>
    
                </div>
    
    
    
    
    
    
    
    
                <div class="row">
    
                    @if (Auth::user()->state == session()->get('selected_customer')['state'])
                    <div class="col-md-6 section-item-border">
                        <span>SGST</span>
                    </div>
        
                    <div class="col-md-6">
                        <span>CGST</span>
                    </div>
                    @else
                    
                    <div class="col section-item-border">
                        <span>IGST</span>
                    </div>
                    
                    @endif
    
               
    
            </div>
            </div>
    
    
    
    
    
    
            <div class="col-md-1 pl-1 section-heading  text-center">
    
                <span>Amount</span>
    
            </div>
    
        </div>
    
    </div>
    
    
    {{-- end of heading --}}
    
    
    
    
    {{-- begining of bill input --}}
    
    
    
    {{-- Bill 1 --}}
    <div class="container no-gutters hrline-bottom hidden-section" id="cloneitem">
    
    
        <div class="row no-gutters ">
    
            <div class="col-md-1 section-item-border no-gutters text-center">
    
                    {{-- <span class="bill-item"></span> --}}
    
                    <div class="row">
    
                      
    
    
                        <div class="col-md-6 text-center">
                            <span class="bill-item">1</span>
                            </div>
    
                    </div>
    
    
    
    
            </div>
    
            <div class="col-md-3 bill-item section-item-border text-center p-0" id="description">
    {{-- item name --}}
               <input type="text" class="w-100 p-0 no-border text-wrap" id="name-1">
              
    
            </div>
    
            <div class="col-md-1 pl-1 bill-item section-item-border text-center">
                {{-- HSN --}}
                <input type="text" class="w-100 p-0 no-border text-wrap text-center" id="hsn-1">
    
            </div>
    
            <div class="col-md-1 pl-1 bill-item section-item-border text-center">
    {{-- QTY --}}
                <input type="text" class="w-100 p-0 no-border text-wrap text-center" id="qty-1" >
    
            </div>
    
            <div class="col-md-1 pl-1 bill-item section-item-border  text-center">
    {{-- Rate --}}
                <input type="text" class="w-100 p-0 no-border text-wrap text-center" readonly id="rate-1">
            </div>
    
            <div class="col-md-4 pl-0 bill-item section-item-border text-center">
    
    
    
                <div class="row h-100">
    
    
                <div class="col-md-6 section-item-border">
                    <span></span><br>
                </div>
    
                <div class="col-md-6 h-100">
                    <span class="text-break"></span>
                </div>
    
            </div>
            </div>
    
    
    
    
    
    
            <div class="col-md-1 pl-1 bill-item  text-center">
    
                <span class="text-break"></span>
    
            </div>
    
        </div>
    
    
    
    </div>
    
    
    {{-- bill section first row  --}}
    
    <div class="container p-0"  id="bill-section">
    
   
    
    </div>


    
    {{-- 2nd bill Empty bill row template--}}
    
    
    
    
    
    
    
    
    
    
    
    {{-- bill 3 --}}
    
    
    
    
    
    
    
    
    
    {{-- bill 4 --}}
    
    
    
    
    
    
    
    
    
    
    </div>
    
    <div class="container">
    
    
        <div class="row">
    
    
            <div class="col-md-7  pr-0">
    
                <div class="mt-3">
                <span  class="text-capitalize mt-2 pt-2 dis-block">total in words </span>
                <span class="section-heading dis-block" id="amount_words"></span>
    
    
                <p class="small-content mt-4 text-capitalize"> Thanks for your Business</p>
    
    
    
                <div >
    
                  <span class=" text-capitalize section-heading"> terms & conditions</span>
    
                  <span  class="dis-block small-content">1.Subject to Ghazibad Jurisdiction.</span>
                  <span class="dis-block small-content">2.This is a computer generated invoice.No signature required.</span>
    
                </div>
    
    
                </div>
    
    
            </div>
            <div class="col-md-1 p-0">
                <div class="hid"></div>
            </div>
    
            <div class="col-md-4 pt-2 hr">
    
                <div class="row hrline-bottom">
                <div class="col-md-2 offset-2 ">
                        <span class="small-content text-nowrap mt-2">Sub Total</span>
    
                        <span class="small-content mt-2" id="show_tax_type">Tax</span>
                        <span class="small-content mt-2 font-weight-bold" >Total</span>
                        {{-- <span class="section-heading mt-2 text-left text-nowrap text-capitalize">balance Due</span> --}}
    
                </div>
    
                <div class="col-md-3 offset-5">
                    <span class="bill-value  text-nowrap mt-2" id="subtotal_value">0</span>
    
                    <span class="bill-value dis-block text-nowrap" id="tax_payable">0</span>
                    <span class="bill-value dis-block mt-2 font-weight-bold  text-nowrap" id="total_payable">0</span>
                    {{-- <span class="section-heading dis-block  text-left text-nowrap text-capitalize">0</span> --}}
                </div>
    
            </div>
    
    
    
    
    
    
            </div>
    
    
    
    
        </div>
    
    
    
    </div>
    
    
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 offset-8 p-0">
                <div class="text-center" style="border-left: 3px ">
                    <p>Authorized Signature</p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    <script>

// var bill_items_list = localStorage.getItem('bill-description-list');

// $("#bill-section").append(bill_items_list);

// var subtotal = localStorage.getItem('taxable_amount');
// var total_tax = localStorage.getItem('total_tax');
// var total_amount = localStorage.getItem('total_payable');

// $('#subtotal_value').text(subtotal);

// $('#tax_payable').text(total_tax);
// $('#total_payable').text(total_amount);
// word = localStorage.getItem('amount_word');
// $('#amount_words').text(word);


    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    