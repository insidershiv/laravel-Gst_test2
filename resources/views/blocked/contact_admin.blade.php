<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



</head>
<body class="bg-color-teal full-height">

    <div class="container d-flex justify-content-center align-items-center mt-5">

        <div class="card">

            <div class="card-title text-danger  p-5 m-5">
               <p> You are blocked. Please Contact Admininstrator. </p>
               <p> You Will be redirected to Login Page.......</p>
            </div>

        </div>

    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


    <script>

setTimeout(jqrequest, 3000);

function jqrequest() {
    $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: "POST",
        url: "/user/logout",

        success: function (response) {
            console.log("success");
            location.href = "login";

        },
        error:function (xhr) {
            console.log("error");
        }
    });
}

    </script>


</body>
</html>
