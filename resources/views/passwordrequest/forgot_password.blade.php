<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>





    <div class="container text-center mt-5">

        <form  class="card mb-5" id="forgot_password_form">
            @csrf
            <div class="form-group row ml-3 mt-5">
                <label for="Email" class="col-sm-2 col-form-label">Email : </label>
                <div class="col-sm-10">
                  <input type="email"  class="form-control col-sm-9 mr-1" id="email" placeholder="Email" required name="email">
                </div>
              </div>

              <button type="submit" class="btn btn-primary mb-5 col-3 offset-4" id="request">Submit</button>



        </form>



    </div>


    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <h4>Request Submitted</h4>
                    <p>You will be notified through message once request is complete</p>
                    {{-- <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i class="material-icons">&#xE5C8;</i></button> --}}
                <a data-dismiss="modal" class="col-sm-3 btn btn-primary" id="complete">OK</a>
                </div>
            </div>
        </div>
    </div>




</body>


<script>



$(document).ready(function () {

var form = document.getElementById("forgot_password_form")
form.addEventListener('submit', function(event) {
    event.preventDefault();
    if (form.checkValidity() === false) {
      event.stopPropagation();
    }
   form.classList.add('was-validated');
    submit();
});

});








function submit() {

    email = $('#email').val();


    $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    type: "POST",

    url: "/forgot_password_request",
    data: {"email":email},

    success: function (response) {

        data = (JSON.parse(response));


        if(data['msg'] == 'true'){

        swal("Request Successfull", "You will be notified once request is complete", "success", {
                button: "continue",
              })
                .then((value) => {
                    if(value)
                    document.location.href="login";

                });
            }

            else if(data['msg'] == 'queued') {
                swal("Request is being Processed", "You will be notified once request is complete", "success", {
                button: "continue",
              })
                .then((value) => {
                    if(value)
                    document.location.href="login";

                });
            }







            else {

                swal("Email is Not registered", "Please Check your email and try again!", "warning", {
                button: "continue",
              })
                .then((value) => {
                    if(value)
                    document.location.href="forgot_password";

                });

            }
    },
    error: function(error){
        swal("Something Went Wrong", "", "error", {
                button: "continue",
              })
                .then((value) => {
                    if(value)
                    document.location.href="forgot_password";

                });
    }
});



}



$('#complete').click(function() {
    location.href = 'login';
});





</script>



</html>





















