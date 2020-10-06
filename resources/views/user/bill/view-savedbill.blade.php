
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" media="all">

    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}" media="all">
    <style type="text/css" media="print">
        @media print {
       @page { margin: 0; }
       body { margin: 5rem; }
     }
     </style>

    @if ($no_items ==1)
        
    <div class="container d-flex justify-content-center align-items-center">

        <p class="h4"> No bills Yet.</p>

    </div>
    
    @else




    <div class="container  pl-0 pr-0 border mt-5">

      

            <div class="row no-gutters">

                <div class="col-md-4">

                    <div class="row">


                        {{--
                        <div class="col-md-4 ">


                            <img src="{{ asset('images/bill.svg') }}" alt="" class="responsive" height="100">
                        </div> --}}

                        <div class="col-md-8 ml-2">

                            <p class="font-weight-bold m-0 text-capitalize"> {{ Auth::user()->company_name }} </p>
                            <div class="heading-company">


                                <p class="m-0 word-wrap text-capitalize">{{ Auth::user()->address }}</p>
                                <p class="m-0 text-capitalize">{{ Auth::user()->city }} {{ Auth::user()->state }}</p>
                                <p class="m-0"> {{ Auth::user()->country }}</p>
                                <p class="m-0"> GSTIN 23154894654898794</p>
                            </div>
                        </div>


                    </div>



                </div>




                <div class="col-md-2 offset-5 text-right no-gutters  align-self-end mb-1">

                    <span class="h4 text-uppercase font-weight-bold">tax invoice</span>

                </div>



            </div>



            <div class="container section-border mt-3">


                <div class="row ">

                    <div class="col-md-6 no-gutters pr-0">
                        <div class="row no-gutters">

                            <div class="col-md-2 heading-due">
                                <p class="m-0">#</p>
                                <p class="m-0 text-nowrap">Invoice Date</p>
                                <p class="m-0 text-nowrap">Terms</p>

                            </div>

                            <div class="col-md-4 offset-6  section-heading"
                                style="border-right: 3px solid rgb(211, 206, 206)">
                                <p class="m-0" id="abcd">: {{ $invoice_id }}</p>
                                <p class="m-0 text-nowrap">: {{ date('d/m/Y') }}</p>
                                <p class="m-0 text-nowrap">: Due On Receipt</p>
                                {{-- <p class="m-0 text-nowrap">: 24/01/2020</p>
                                --}}




                            </div>


                        </div>

                    </div>



                    <div class="col-md-6  p-0">

                        <div class="row no-gutters">

                            <div class="col-md-2 p-0 ml-1 heading-company">
                                <p>Place Of Supply</p>

                            </div>

                            <div class="col-md-2 offset-4 section-heading">
                                <p class="text-capitalize">:{{ Auth::user()->state }}</p>
                            </div>


                        </div>




                    </div>




                </div>

            </div>

            <div class="section-heading pl-1 ">
                <p class="p-0 m-0">Bill To</p>
            </div>





            <div class="container section-border" id="pa">

                <div class="row ">

                    <div class="col-md-4 pl-1 ml-3">

                        <div class="row">
                            {{-- <input type="text"
                                class="no-border input-sm section-heading text-capitalize bg-color-grey pt-0 pb-0"
                                placeholder="Company Name" value="{{ session()->get('selected_customer')['name'] }}">
                            --}}
                            <span class="text-capitalize bg-color-grey pt-0 pb-0 ml-1">{{ $customer['name'] }}</span>
                        </div>

                        {{-- <p class="p-0 m-0 section-heading">Decathlon Sports India Pvt.
                            Ltd.</p> --}}

                        {{-- <p class="p-0 m-0 small-content text-capitalize">Pacific Mall,
                            tagore Garden</p>
                        <p class="p-0 m-0 small-content text-capitalize ">new delhi</p>
                        <p class="p-0 m-0 small-content">110018</p>
                        <p class="p-0 m-0 small-content">GSTIN 12345678999</p> --}}

                        <div class="row">
                            {{-- <input type="text"
                                class="no-border input-sm section-heading text-capitalize bg-color-grey pt-0 pb-0"
                                placeholder="Company Name"
                                value="{{ session()->get('selected_customer')['company_name'] }}">
                            --}}
                            <span
                                class="text-capitalize bg-color-grey pt-0 pb-0 ml-1">{{ $customer['company_name'] }}</span>
                        </div>

                        <div class="row">
                            {{-- <input type="text"
                                class="no-border section-heading input-sm text-capitalize m-0 p-0 bg-color-grey"
                                placeholder="Address Line 1" autocomplete="off"
                                value="{{ session()->get('selected_customer')['address'] }}">
                            --}}
                            <span class="text-capitalize bg-color-grey pt-0 pb-0 ml-1">{{ $customer['address'] }}</span>

                        </div>


                        <div class="row">
                            {{-- <input type="text"
                                class="no-border section-heading text-capitalize input-sm bg-color-grey" placeholder="city"
                                autocomplete="off"
                                value="{{ session()->get('selected_customer')['city'] }} {{ session()->get('selected_customer')['state'] }}">
                            --}}
                            <span class="text-capitalize bg-color-grey pt-0 pb-0 ml-1">{{ $customer['city'] }}
                                {{ $customer['state'] }}</span>
                        </div>



                        <div class="row">
                            {{-- <input type="text"
                                class="no-border section-heading text-capitalize input-sm bg-color-grey"
                                placeholder="PinCode" autocomplete="off"
                                value="{{ session()->get('selected_customer')['pincode'] }}">
                            --}}
                            <span class="text-capitalize bg-color-grey pt-0 pb-0 ml-1">{{ $customer['pincode'] }}</span>


                        </div>



                        <div class="row">
                            <span class="section-heading ml-1">GST :</span><input type="text"
                                class="no-border section-heading text-capitalize ml-2 bg-color-grey" placeholder="GSt">

                        </div>









                    </div>

                </div>


            



        </div>





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

                            @if (Auth::user()->state == $customer["state"])
                                <div class="col-md-6 section-item-border">
                                    <span>SGST</span>
                                </div>

                                <div class="col-md-6">
                                    <span>CGST</span>
                                </div>
                                <script>
                                    samestate = 1;
                                </script>
                            @else

                                <div class="col section-item-border">
                                    <span>IGST</span>
                                </div>
                                <script>
                                    samestate = 0 ;
                                </script>

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
                        <input type="text" class="w-100 p-0 no-border text-wrap text-center" id="qty-1">

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


            {{-- bill section first row --}}
            

            <div class="container p-0" id="bill-section">



                
@foreach ($bill_details as $item)

@if (Auth::user()->state == $customer["state"])
    

<div class="container no-gutters hrline-bottom" id="cloneitem">


    <div class="row no-gutters ">

        <div class="col-md-1 section-item-border no-gutters text-center">

            {{-- <span class="bill-item"></span> --}}

            <div class="row">




                <div class="col-md-6 text-center">
                <span class="bill-item">{{$loop->iteration}}</span>
                </div>

            </div>




        </div>

        <div class="col-md-3 bill-item section-item-border text-center p-0" id="description">
            {{-- item name --}}
        <input type="text" class="w-100 p-0 no-border text-wrap text-capitalize"  value="{{$item["item_name"]}}">


        </div>

        <div class="col-md-1 pl-1 bill-item section-item-border text-center">
            {{-- HSN --}}
        <input type="text" class="w-100 p-0 no-border text-wrap text-center"  value="{{$item["hsn_sac"]}}">

        </div>

        <div class="col-md-1 pl-1 bill-item section-item-border text-center">
            {{-- QTY --}}

         @if ($item["item_qty"] == 0)
         <input type="text" class="w-100 p-0 no-border text-wrap text-center"  value="N/A">
         @else
         <input type="text" class="w-100 p-0 no-border text-wrap text-center"  value="{{$item["item_qty"]}}">

         @endif

        </div>

        <div class="col-md-1 pl-1 bill-item section-item-border  text-center">
            {{-- Rate --}}
            <input type="text" class="w-100 p-0 no-border text-wrap text-center" readonly value="{{$item["rate"]}}">
        </div>

        <div class="col-md-4 pl-0 bill-item section-item-border text-center">



            <div class="row h-100">


                <div class="col-md-6 section-item-border">
                <span>{{$item["sgst"]}}  <span class="small">@ {{$item["sgst_rate"]}} % </span>  </span><br>
                </div>

                <div class="col-md-6 h-100">
                <span class="text-break">{{$item["cgst"]}} <span class="small">@ {{$item["cgst_rate"]}} %</span> </span>
                </div>

            </div>
        </div>






        <div class="col-md-1 pl-1 bill-item  text-center">

            <span class="text-break">{{$item["item_total"]}}</span>

        </div>

    </div>



</div>


@else



<div class="container no-gutters hrline-bottom" id="cloneitem">


    <div class="row no-gutters ">

        <div class="col-md-1 section-item-border no-gutters text-center">

            {{-- <span class="bill-item"></span> --}}

            <div class="row">




                <div class="col-md-6 text-center">
                <span class="bill-item">{{$loop->iteration}}</span>
                </div>

            </div>




        </div>

        <div class="col-md-3 bill-item section-item-border text-center p-0" id="description">
            {{-- item name --}}
        <input type="text" class="w-100 p-0 no-border text-wrap text-capitalize"  value="{{$item["item_name"]}}">


        </div>

        <div class="col-md-1 pl-1 bill-item section-item-border text-center">
            {{-- HSN --}}
        <input type="text" class="w-100 p-0 no-border text-wrap text-center"  value="{{$item["hsn_sac"]}}">

        </div>

        <div class="col-md-1 pl-1 bill-item section-item-border text-center">
            {{-- QTY --}}

         @if ($item["item_qty"] == 0)
         <input type="text" class="w-100 p-0 no-border text-wrap text-center"  value="N/A">
         @else
         <input type="text" class="w-100 p-0 no-border text-wrap text-center"  value="{{$item["item_qty"]}}">

         @endif

        </div>

        <div class="col-md-1 pl-1 bill-item section-item-border  text-center">
            {{-- Rate --}}
            <input type="text" class="w-100 p-0 no-border text-wrap text-center" readonly value="{{$item["rate"]}}">
        </div>

        <div class="col-md-4 pl-0 bill-item section-item-border text-center">



            <div class="row h-100">


              

                <div class="col-md-6 h-100">
                <span class="text-break">{{$item["igst"]}} <span class="small">@ {{$item["igst_rate"]}} %</span> </span>
                </div>

            </div>
        </div>






        <div class="col-md-1 pl-1 bill-item  text-center">

            <span class="text-break">{{$item["item_total"]}}</span>

        </div>

    </div>



</div>










@endif



    
@endforeach








            </div>



            {{-- 2nd bill Empty bill row template--}}











            {{-- bill 3 --}}









            {{-- bill 4 --}}










        </div>

        <div class="container">


            <div class="row">


                <div class="col-md-7  pr-0">

                    <div class="mt-3">
                        <span class="text-capitalize mt-2 pt-2 dis-block">total in words </span>
                    <span class="section-heading dis-block" id="amount_words">{{$final_amounts["amount_words"]}}</span>


                        <p class="small-content mt-4 text-capitalize"> Thanks for your Business</p>



                        <div>

                            <span class=" text-capitalize section-heading"> terms & conditions</span>

                            <span class="dis-block small-content">1.Subject to Ghazibad Jurisdiction.</span>
                            <span class="dis-block small-content">2.This is a computer generated invoice.No signature
                                required.</span>

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
                            <span class="small-content mt-2 font-weight-bold">Total</span>
                            {{-- <span
                                class="section-heading mt-2 text-left text-nowrap text-capitalize">balance Due</span>
                            --}}

                        </div>

                        <div class="col-md-3 offset-5">
                        <span class="bill-value  text-nowrap mt-2" id="subtotal_value">{{$final_amounts["subtotal"]}}</span>

                        <span class="bill-value dis-block text-nowrap" id="tax_payable">{{$final_amounts["tax"]}}</span>
                            <span class="bill-value dis-block mt-2 font-weight-bold  text-nowrap"
                        id="total_payable">{{$final_amounts["total_amount"]}}</span>
                            {{-- <span
                                class="section-heading dis-block  text-left text-nowrap text-capitalize">0</span>
                            --}}
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











    </div>



    @endif


    <div class="row d-flex justify-content-center align-items-center mt-5">

    
        <button class="btn btn-success" id="printid" onclick="printbill()">Print </button>
        
    </div>


<script>


    function printbill() {
    
    // console.log(localStorage.getItem('bill-description-list'));
    $('#printid').hide();
    window.print();
      
      }
    
  </script>