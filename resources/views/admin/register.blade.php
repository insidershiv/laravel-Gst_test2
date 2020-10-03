@extends('layouts.dashboard')

@section('title', 'New|User')

@section('content')

{{--
<div class="container pl-0 pr-5 m-0 ml-5">

<form action="{{route('admin.register')}}" method="POST">
@csrf
<div class="form-group row">
    <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-5">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


</div>


    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

        <div class="col-md-6">
            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name">

            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('mobile') }}</label>

        <div class="col-md-6">
            <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

        <div class="col-md-6">
            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

            @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('state') }}</label>

        <div class="col-md-6">
            <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state">

            @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('country') }}</label>

        <div class="col-md-6">
            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

            @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>











    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

     <div class="form-group row text-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>


</form>


</div> --}}

<div class="col-12 text-center">
    <h4 class="text-warning">Create New User</h4>
</div>



<div class="container-fluid  p-0 text-center mt-5">
<form action="{{route('admin.register')}}" method="POST">
    @csrf
    <div class="form-row">

        <div class="form-group input-group col-md-6">

            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user text-info"></i> </span>
              </div>

              <input id="name" type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="UserName">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
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
                    <strong>{{ $message }}</strong>
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

              <input id="company_name" type="text" class="form-control text-capitalize @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" placeholder="Name of Company">

            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>




        <div class="form-group input-group col-md-7">


            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marked text-info"></i></span>
              </div>

              <input id="address" type="text" class="form-control text-capitalize @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Address Of Company">

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>


    <div class="form-row mt-3">
        <div class="form-group input-group col-md-3">


            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="basic-addon1">Country</span>
              </div>

              <input id="country" type="text" class="form-control text-capitalize @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" placeholder="Country">

              @error('country')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

        </div>


        <div class="form-group input-group col-md-3">


            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="basic-addon1">State</span>
              </div>

              <input id="state" type="text" class="form-control text-capitalize @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" placeholder="State">

            @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>


        <div class="form-group input-group col-md-3">


            <div class="input-group-prepend">
                <span class="input-group-text text-info" id="basic-addon1">City</span>
              </div>

              <input id="city" type="text" class="form-control text-capitalize @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="City">

              @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

        </div>



        <div class="form-group input-group col-md-3">


            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile text-info"></i></span>
              </div>

              <input id="mobile" type="number" class="form-control text-capitalize @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" placeholder="Contact Number">

            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>






    </div>


    <div class="form-row mt-3">

        <div class="form-group input-group col-md-6">


            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key text-info"></i></span>
              </div>

              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>



        <div class="form-group input-group col-md-6">


            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key text-info"></i></span>
              </div>

              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

        </div>


    </div>


    <div class="form-row mt-5">


            <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-success d-inline-block col-md-6">
                    {{ __('Register') }}
                </button>
            </div>



    </div>



</form>



</div>


<script src="{{asset("js/register-user.js")}}"></script>

@endsection
