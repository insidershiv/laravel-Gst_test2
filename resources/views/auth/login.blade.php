<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/login.css')}}">

</head>
<body>


<div class="container h-100 d-flex justify-content-center align-items-center image-overlay">

    <div class="card col-md-5 p-0" style="height: 35rem">

        <div class="container p-0">
            <div class="card-body p-0 m-0">
                <h3 class="card-title login-title pt-4 pb-4">Login</h3>
            </div>

            <div class="container mt-5 pt-4">
            <form method="POST" action="{{ route('login') }}" class="ml-4 mt-4 mr-4">
                @csrf

                <div class="form-group text-center">

                    <div>
                        <input id="email" type="email" class="form-control no-border login-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>



                <div class="form-group text-center mt-5">

                    <div>
                        <input id="password" type="password" class="form-control no-border login-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>





                <div class="form-group row">
                    <div class="col-md-6 offset-md-3 mt-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>



                <div class="form-group no">
                    <div class="col-md-8 mx-auto text-center">
                        <button type="submit" class="btn btn-info btn-block">
                            {{ __('SignIn') }}
                        </button>

                        @if (Route::has('password.forgot'))
                            <a class="btn btn-link" href="{{ route('password.forgot') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>







            </form>

        </div>
        </div>
        </div>

        </div>



    </body>
    </html>
