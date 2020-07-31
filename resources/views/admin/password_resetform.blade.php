@extends('layouts.dashboard')

@section('content')



<div class="container">



    <form action="/admin/password_reset" method="POST">
        @csrf


        <div class="form-group row">

            <label for="password" class="col-form-label">Email: </label>
        <input type="text" name="email" id="email" class ="form-control" value="{{$data->email}}" readonly>


        </div>

        <div class="form-group row">

            <label for="password" class="col-form-label">Password: </label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        </div>


        <div class="form-group row">

            <label for="password" class="col-form-label">Confirm Password: </label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">


        </div>

        <button class="btn btn-primary" type="submit"> Update Password</button>


    </form>


</div>






@endsection
