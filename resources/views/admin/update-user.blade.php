@extends('layouts.dashboard')

@section('content')


<div class="col-12 text-center">
    <h4 class="text-warning">Update</h4>
</div>



<div class="container-fluid  p-0 text-center mt-5">
<form>
    @csrf
    <div class="form-row">

        <div class="form-group input-group col-md-6">

            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-1"><i class="fas fa-user text-info"></i> </span>
              </div>


              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data ->name }}" required autocomplete="name" autofocus placeholder="UserName">

        @error('name')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        </div>


        <div class="form-group input-group col-md-6">


            <div class="input-group-prepend">
                <span class="input-group-text" id="addon2"><i class="fas fa-paper-plane text-info"></i></span>
              </div>

              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" required autocomplete="email" placeholder="Email Address">

            @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

    </div>

    {{-- end of first Row form --}}



    <div class="form-row mt-3">

        <div class="form-group input-group col-md-5">

            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="addon3">Company</span>
              </div>

              <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ $data ->company_name }}" required autocomplete="company_name" placeholder="Name of Company">

            @error('company_name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>




        <div class="form-group input-group col-md-7">


            <div class="input-group-prepend">
                <span class="input-group-text" id="addon4"><i class="fas fa-map-marked text-info"></i></span>
              </div>

              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $data->address }}" required autocomplete="address" placeholder="Address Of Company">

            @error('address')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>


    <div class="form-row mt-3">
        <div class="form-group input-group col-md-3">


            <div class="input-group-prepend clearfix">
                <span class="input-group-text text-info clearfix" id="addon5" style="max-height: 37px">Country</span>
              </div>

              <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $data->country }}" required autocomplete="country" placeholder="Country">

              @error('country')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

        </div>


        <div class="form-group input-group col-md-3">


            <div class="input-group-prepend clearfix">
                <span class="input-group-text text-info clearfix" id="addon6">State</span>
                <div class="clearfix"></div>
              </div>

              <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $data->state }}" required autocomplete="state" placeholder="State">

            @error('state')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>


        <div class="form-group input-group col-md-3">


            <div class="input-group-prepend clearfix">
                <span class="input-group-text text-info clearfix" id="addon7">City</span>
                <div class="clearfix"></div>
              </div>



              <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $data->city }}" required autocomplete="city" placeholder="City">

              @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

        </div>



        <div class="form-group input-group col-md-3">


            <div class="input-group-prepend">
                <span class="input-group-text clearfix" id="addon8"><i class="fas fa-mobile text-info"></i></span>
                <div class="clearfix"></div>
              </div>

              <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $data->mobile }}" required autocomplete="mobile" placeholder="Contact Number">

            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>






    </div>





    <div class="form-row mt-5">

        <div class="col-md-4">
            <div class="custom-control custom-checkbox mr-sm-2">
                <input type="checkbox" class="custom-control-input" id="update_check" name="update_check">
                <label class="custom-control-label " for="update_check"><small> Update Email </small></label>
              </div>
        </div>




            <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-success d-inline-block col-md-6" onclick="update(event)" id="{{$data->id}}">
                    {{ __('Update') }}
                </button>
            </div>



    </div>



</form>



</div>



<script src="{{asset("js/update-user.js")}}"></script>
@endsection
