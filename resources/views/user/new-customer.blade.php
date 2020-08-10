@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-center">
    <h4 class="text-warning">Add new Customer</h4>
</div>



<div class="container-fluid  p-0 text-center mt-5 card p-3">
<form action="{{route('user.newcustomer')}}" method="POST">
    @csrf
    <div class="form-row">

        <div class="form-group input-group col-md-6">

            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user text-info"></i> </span>
              </div>

              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Customer Name">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong> <small> {{ $message }}</small></strong>
            </span>
        @enderror

        </div>


        <div class="form-group input-group col-md-6">


            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-paper-plane text-info"></i></span>
              </div>

              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong> <small> {{ $message }}</small></strong>
                </span>
            @enderror

        </div>

    </div>

    {{-- end of first Row form --}}



    <div class="form-row mt-3">

        <div class="form-group input-group col-md-5">

            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="basic-addon1">Company</span>
              </div>

              <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" placeholder="Name of Company">

            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong> <small> {{ $message }}</small></strong>
                </span>
            @enderror

        </div>




        <div class="form-group input-group col-md-7">


            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marked text-info"></i></span>
              </div>

              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Address Of Company">

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong> <small> {{ $message }}</small></strong>
                </span>
            @enderror
        </div>

    </div>


    <div class="form-row mt-3">
        <div class="form-group input-group col-md-2">


            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="basic-addon1">Country</span>
              </div>

              <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" placeholder="Country">

              @error('country')
                  <span class="invalid-feedback" role="alert">
                      <strong> <small> {{ $message }}</small></strong>
                  </span>
              @enderror

        </div>


        <div class="form-group input-group col-md-2">


            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="basic-addon1">State</span>
              </div>

              <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" placeholder="State">

            @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong> <small> {{ $message }}</small></strong>
                </span>
            @enderror

        </div>


        <div class="form-group input-group col-md-2">


            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="basic-addon1">City</span>
              </div>

              <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="City">

              @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong> <small> {{ $message }}</small></strong>
                  </span>
              @enderror

        </div>



        <div class="form-group input-group col-md-2">


            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="basic-addon1">Pin</span>
              </div>

              <input id="pincode" type="number" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode') }}" required autocomplete="pincode" placeholder="pincode">

              @error('pincode')
                  <span class="invalid-feedback" role="alert">
                      <strong> <small> {{ $message }}</small></strong>
                  </span>
              @enderror

        </div>



        <div class="form-group input-group col-md-4">


            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile text-info"></i></span>
              </div>

              <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" placeholder="Contact Number">

            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong> <small> {{ $message }}</small></strong>
                </span>
            @enderror

        </div>






    </div>



    <div class="form-row mt-5">


            <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-success d-inline-block col-md-6">
                    {{ __('Add Customer') }}
                </button>
            </div>



    </div>



</form>



</div>


<script src="{{asset("js/main.js")}}"></script>
@endsection
