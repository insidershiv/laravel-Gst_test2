@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@foreach ($user as $user)


<div class="container">

    <div class="d-flex justify-content-center align-items-center">
        <h4 class="text-primary">My Profile</h4>
    </div>

    <form class="mt-5">

    <ul class="list-inline">
    <li class="list-inline-item col-md-2 col-sm-3 col-xs-2 text-gray-600  large-font">Name</li>
    <li class="list-inline-item col-md-8 text-capitalize">  <input type="text" class="form-control  text-capitalize " data-toggle="tooltip" data-placement="top" title="Type new value to Update" value="{{$user->name}}" name="name" id="name" required> </li>
    </ul>


    <ul class="list-inline">
        <li class="list-inline-item col-md-2 col-sm-3 text-gray-600  large-font">Email</li>
    <li class="list-inline-item col-md-6 text-capitalize">   <input type="email" class="form-control  text-capitalize "  readonly value="{{$user->email}}" id="email" name="email" required> </li>

    <li class="list-inline-item ml-auto">  <strong> <small class="text-info">Email cannot be Updated </small> </strong> </li>
    </ul>



    <ul class="list-inline">
        <li class="list-inline-item col-md-2 col-sm-3 text-gray-600  large-font">Contact</li>
    <li class="list-inline-item col-md-8 text-capitalize"> <input type="text" class="form-control  text-capitalize " data-toggle="tooltip" data-placement="top" title="Type new value to Update" value="{{$user->mobile}}" id="mobile" name="mobile" required> </li>

    </ul>


    <ul class="list-inline">
        <li class="list-inline-item col-md-2 col-sm-3 text-gray-600  large-font">Company</li>
    <li class="list-inline-item col-md-8 text-capitalize">  <input type="text" class="form-control  text-capitalize " data-toggle="tooltip" data-placement="top" title="Type new value to Update" value="{{$user->company_name}}" name="company_name" id="company_name" required> </li>

    </ul>


    <ul class="list-inline">
        <li class="list-inline-item col-md-2 col-sm-3 text-gray-600  large-font">Address</li>
    <li class="list-inline-item col-md-8 text-capitalize">  <input type="text" class="form-control  text-capitalize " data-toggle="tooltip" data-placement="top" title="Type new value to Update" value="{{$user->address}}" name="address" id="address" required> </li>

    </ul>

    <ul class="list-inline">
        <li class="list-inline-item col-md-2 col-sm-3 text-gray-600  large-font">Country</li>
    <li class="list-inline-item col-md-8 text-capitalize">  <input type="text" class="form-control  text-capitalize " data-toggle="tooltip" data-placement="top" title="Type new value to Update" value="{{$user->country}}" name="country" id="country" required> </li>

    </ul>

    <ul class="list-inline">
        <li class="list-inline-item col-md-2 col-sm-3 text-gray-600  large-font">State</li>
    <li class="list-inline-item col-md-8 text-capitalize">  <input type="text" class="form-control  text-capitalize " data-toggle="tooltip" data-placement="top" title="Type new value to Update" value="{{$user->state}}" name="state" id="state" required></li>

    </ul>

    <ul class="list-inline">
        <li class="list-inline-item col-md-2 col-sm-3 text-gray-600  large-font">City</li>
    <li class="list-inline-item col-md-8 text-capitalize"> <input type="text" class="form-control  text-capitalize " data-toggle="tooltip" data-placement="top" title="Type new value to Update" value="{{$user->city}}" name="city" id="city" required></li>

    </ul>

<div class="d-flex justify-content-center align-items-center mt-5">



<button class="btn btn-success btn-sm col-4" id="{{$user->id}}" onclick="modal_form(event)">Update Profile</button>
</form>
</div>
</div>



@endforeach

<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});










function modal_form(event) {
    event.preventDefault();
 var id =  event.target.id;


    name = document.getElementById('name').value;
    email = document.getElementById('email').value;
    company_name = document.getElementById('company_name').value;
    country = document.getElementById('country').value;
    city = $("#city").val();
    mobile = $("#mobile").val();
    address = $("#address").val();
    state = $('#state').val();




 $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/user/profile/update/"+id,
        data: {"name":name, "company_name":company_name, "country":country, "city":city, "mobile":mobile, "address":address, "id":id, "state":state},

        success: function (response) {

            swal("Updation", "Successfull", "success", {
                button: "continue",
              })
                .then((value) => {
                    if(value)
                   location.reload();

                });


        },
        error: function (xhr) {
            console.log(xhr);
            // if(!xhr.responseText){
            //     return;
            // }
            response = (xhr.responseText);
            response = JSON.parse(response);
            errors = (response.errors);
            console.log(errors);
            keys = Object.keys(errors);
            console.log(keys);

            // console.log(errors.mobile);

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
                parent.classList.add('col-md-8');
                parent.classList.remove('col-md-6');

            }

            remove_span = document.querySelectorAll('.text-danger');

            for (k = 0; k < remove_span.length; k++) {
                var remove = remove_span[k];

                // remove.textContent = '';
                remove.remove();
            }

            for (j = 0; j < keys.length; j++) {
                val = keys[j];

                obj = document.getElementById(keys[j]);
                obj.classList.add('is-invalid');
                parent = (obj.parentNode);
                parent.classList.remove('col-md-8');
                parent.classList.add('col-md-6');
                parent.insertAdjacentHTML('afterend', `<li class="list-inline-item ml-auto"> <span class="text-danger" role="alert">
                    <small>${arr[val]}</small>
                </span></li>` );
            }

        }
    });

}











</script>

@endsection
