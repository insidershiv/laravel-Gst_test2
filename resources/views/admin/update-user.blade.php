@extends('layouts.dashboard')

@section('content')


<x-search />



<div class="container d-flex align-items-center justify-content-center mt-5">
    {{-- {{$users}} --}}
</div>




<script>

    function search() {


    var value = document.getElementById('search-value').value;


    $.ajax({
        type: "get",
        url: "/admin/search/?filter[test]="+value,


        success: function (response) {

        console.log(response);



        },
        error:function(error) {

        }
    });





    // $.ajax({
    //     type: "get",
    //     url: "/admin/search/?filter[email]="+value,


    //     success: function (response) {

    //         for(var i = 0 ; i<response.length; i++) {
    //             result[i] = response[i];
    //         }


    //     },
    //     error:function(error) {
    //         console.log("df");
    //     }
    // });


    // console.log(result);

    }





</script>


@endsection
