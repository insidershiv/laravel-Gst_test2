
<div class="container">

    <div class="row no-gutters">
    
    <div class="col-md-4">
    
        <div class="row">
    
    
{{--     
    <div class="col-md-4 ">
    
    
        <img src="{{asset('images/bill.svg')}}" alt="" class="responsive"  height="100">
    </div> --}}
    
    <div class="col-md-8">
    
        <p class="font-weight-bold m-0 text-capitalize"> {{Auth::user()->company_name}} </p>
        <div class="heading-company">
    
    
        <p class="m-0 word-wrap text-capitalize">{{Auth::user()->address}}</p>
        <p class="m-0 text-capitalize">{{Auth::user()->city}} {{Auth::user()->state}}</p>
        <p class="m-0"> {{Auth::user()->country}}</p>
        <p class="m-0"> GSTIN 23154894654898794</p>
        </div>
    </div>
    
    
        </div>
    
    
    
    </div>
    
    
    
    
    <div class="col-md-2 offset-6 text-right no-gutters  align-self-end mb-1">
    
      <span class="h4 text-uppercase font-weight-bold"  >tax invoice</span>
    
    </div>
    
    
    
    </div>
    
    
    
    </div>
    
    <div class="container section-border mt-3">
    
    
    <div class="row " >
    
        <div class="col-md-6 no-gutters pr-0">
        <div class="row no-gutters">
    
            <div class="col-md-2 heading-due">
                <p class="m-0">#</p>
                <p class="m-0 text-nowrap">Invoice Date</p>
                <p class="m-0 text-nowrap">Terms</p>
    
            </div>
    
            <div class="col-md-4 offset-6  section-heading" style="border-right: 3px solid rgb(211, 206, 206)">
                <p class="m-0" id="abcd">: sk-2020-0103</p>
                <p class="m-0 text-nowrap">: {{date("d/m/Y")}}</p>
                <p class="m-0 text-nowrap">: Due On Receipt</p>
                {{-- <p class="m-0 text-nowrap">: 24/01/2020</p> --}}
             
    
    
    
            </div>
    
    
        </div>
    
    </div>
    
    
    
    <div class="col-md-6  p-0" >
    
        <div class="row no-gutters">
    
            <div class="col-md-2 p-0 ml-1 heading-company">
                <p>Place Of Supply</p>
    
            </div>
    
            <div class="col-md-2 offset-4 section-heading">
            <p class="text-capitalize">:{{Auth::user()->state}}</p>
            </div>
    
    
        </div>
    
    
    
    
    </div>
    
    
    
    
        </div>
    
    </div>
    
    <div class="section-heading pl-1 "><p class="p-0 m-0">Bill To</p></div>
    
    
    