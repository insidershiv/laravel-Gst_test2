<div class="container section-border" id="pa">

    <div class="row ">
    
        <div class="col-md-4 pl-1 ml-3">
    
            <div class="row">
                {{-- <input type="text" class="no-border input-sm section-heading text-capitalize bg-color-grey pt-0 pb-0" placeholder="Company Name" value="{{ session()->get('selected_customer')['name'] }}"> --}}
           <span class="text-capitalize bg-color-grey pt-0 pb-0">{{ session()->get('selected_customer')['name'] }}</span>
            </div>
    
            {{-- <p class= "p-0 m-0 section-heading">Decathlon Sports India Pvt. Ltd.</p> --}}
    
            {{-- <p class= "p-0 m-0 small-content text-capitalize">Pacific Mall, tagore Garden</p>
            <p class= "p-0 m-0 small-content text-capitalize ">new delhi</p>
            <p class= "p-0 m-0 small-content">110018</p>
            <p class= "p-0 m-0 small-content">GSTIN 12345678999</p> --}}

            <div class="row">
                {{-- <input type="text" class="no-border input-sm section-heading text-capitalize bg-color-grey pt-0 pb-0" placeholder="Company Name" value="{{ session()->get('selected_customer')['company_name'] }}"> --}}
                <span class="text-capitalize bg-color-grey pt-0 pb-0">{{ session()->get('selected_customer')['company_name'] }}</span>
            </div>

            <div class="row">
                {{-- <input type="text" class="no-border section-heading input-sm text-capitalize m-0 p-0 bg-color-grey" placeholder="Address Line 1" autocomplete="off" value="{{ session()->get('selected_customer')['address'] }}"> --}}
                <span class="text-capitalize bg-color-grey pt-0 pb-0">{{ session()->get('selected_customer')['address'] }}</span>
    
            </div>
    
    
            <div class="row">
                {{-- <input type="text" class="no-border section-heading text-capitalize input-sm bg-color-grey" placeholder="city" autocomplete="off" value="{{ session()->get('selected_customer')['city'] }} {{ session()->get('selected_customer')['state'] }}"> --}}
                <span class="text-capitalize bg-color-grey pt-0 pb-0">{{ session()->get('selected_customer')['city']  }} {{ session()->get('selected_customer')['state'] }}</span>    
            </div>
    
    
    
            <div class="row">
                {{-- <input type="text" class="no-border section-heading text-capitalize input-sm bg-color-grey" placeholder="PinCode" autocomplete="off" value="{{ session()->get('selected_customer')['pincode'] }}"> --}}
                <span class="text-capitalize bg-color-grey pt-0 pb-0">{{ session()->get('selected_customer')['pincode'] }}</span>

    
            </div>
    
    
    
            <div class="row">
                <span class="section-heading">GST :</span><input type="text" class="no-border section-heading text-capitalize ml-2 bg-color-grey" placeholder="GSt">
    
            </div>
    
    
    
    
    
    
    
    
    
        </div>
    
    </div>
    
    
    </div>
    