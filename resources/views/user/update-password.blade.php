@extends('layouts.dashboard')

@section('title', 'User | Update Password')


@section('content')

<div class="container">

    <form id="update-password">
        @csrf


     <div class="form-group row">

        <label for="old_password" class="col-form-label">Old Password : </label>

        <input type="text" class="form-control" placeholder="Type Your Old Password" name="old_password" required id="old_password" onfocusout = "submit_form_old()" onfocus = 'clears()'>

     <input type="text" style="display: none" value={{Auth::user()->email}} id="email">


     </div>

     <div class="form-group row">

        <label for="password" class="col-form-label">New Password : </label>

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">



     </div>


     <div class="form-group row">

        <label for="old_password" class="col-form-label">Confirm Password : </label>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">



     </div>

     <button class="btn btn-primary btn-sm  col-sm-4  col-6 offset-md-4 offset-sm-4 mt-5" type="submit">Update Password</button>


    </form>

</div>


<script>


function submit_form_old() {

    old_password = $('#old_password').val();

    email = document.getElementById('email').value;
    obj = document.getElementById("old_password");

    obj.classList.remove('is-invalid');
    remove_span = document.querySelectorAll('.invalid-feedback');

for (k = 0; k < remove_span.length; k++) {
    var remove = remove_span[k];

    // remove.textContent = '';
    remove.remove();
}


    $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: "POST",
        url: "/user/old_password_check",
        data: {"old_password":old_password, "email":email},

        success: function (response) {
            data = JSON.parse(response);

            if(data["status"] == 0) {

                // $('#old_password').addClass('is-invalid');
                // $('#old_password').append('<span class="invalid-feedback" role="alert"> Incorrect Password </span>  ' );

                if(obj.value == ''){

                    obj.classList.add('is-invalid');
                obj.insertAdjacentHTML('afterend', ` <span class="invalid-feedback" role="alert">
                    <small>Required</small>
                </span>`);

                }else {

                obj.classList.add('is-invalid');
                obj.insertAdjacentHTML('afterend', ` <span class="invalid-feedback" role="alert">
                    <small>Incorrect Password</small>
                </span>`);
            }

            }
        },
        error: function (error) {
            console.log(error);
        }
    });




}


function clears() {

    element = document.querySelectorAll('.is-invalid');
    console.log(element);

            for (i = 0; i < element.length; i++) {
                ele = element[i];
                ele.classList.remove('is-invalid');

            }

            remove_span = document.querySelectorAll('.invalid-feedback');

            for (k = 0; k < remove_span.length; k++) {
                var remove = remove_span[k];

                // remove.textContent = '';
                remove.remove();
            }
}





$(document).ready(function () {

var form = document.getElementById("update-password")
form.addEventListener('submit', function(event) {
    event.preventDefault();
    if (form.checkValidity() === false) {
      event.stopPropagation();
    }
//    form.classList.add('was-validated');
    submit_form();
});

});





function submit_form() {

    email = document.getElementById('email').value;
    password = document.getElementById("password").value;
    confirm_password = document.getElementById('password-confirm').value;

    $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: "POST",
        url: "/user/update_password",
        data: {"email":email, "password":password, "confirm_password":confirm_password},


        success: function (response) {





element = document.querySelectorAll('.is-invalid');   // to clear the invalid-feedback if there was any before getting successfull result

for (i = 0; i < element.length; i++) {
    ele = element[i];
    ele.classList.remove('is-invalid');

}

remove_span = document.querySelectorAll('.invalid-feedback');

for (k = 0; k < remove_span.length; k++) {
    var remove = remove_span[k];


    remove.remove();
}
// end of clear invalid-feedback


swal("You Need to Re-login Again")
.then((value) => {


location.href = "/login";





});






        },
        error:function(xhr) {
            response = (xhr.responseText);
            response = JSON.parse(response);
            errors = (response.errors);
            keys = Object.keys(errors);



            arr = {};

            for(l =0 ; l<keys.length; l++) {
                temp = keys[l];

                temp1 = errors[temp];
                temp1 = temp1[0];

                arr[keys[l]] = temp1;
            }



            element = document.querySelectorAll('.is-invalid');

            for (i = 0; i < element.length; i++) {
                ele = element[i];
                ele.classList.remove('is-invalid');

            }

            remove_span = document.querySelectorAll('.invalid-feedback');

            for (k = 0; k < remove_span.length; k++) {
                var remove = remove_span[k];

                // remove.textContent = '';
                remove.remove();
            }
            console.log(keys);

            for (j = 0; j < keys.length; j++) {
                val = keys[j];
                console.log(keys[j]);

                obj = document.getElementById(keys[j]);
                if(keys[j] == 'confirm_password' ) {
                    obj = document.getElementById('password-confirm');
                }
                obj.classList.add('is-invalid');
                obj.insertAdjacentHTML('afterend', ` <span class="invalid-feedback" role="alert">
                    <small>${arr[val]}</small>
                </span>`);
            }



        }
    });




}







</script>

@endsection
