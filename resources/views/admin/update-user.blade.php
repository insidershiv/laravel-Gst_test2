@extends('layouts.dashboard')

@section('content')


<x-search />



<div class="container d-flex align-items-center justify-content-center mt-5">
    {{-- {{$users}} --}}
</div>




<script>

    function search() {

        var result = [];
        var result2 = [];
        var name = [];
        var email = [];
    var value = document.getElementById('search-value').value;
        console.log("/admin/search/?filter[name]="+value + "&filter[email]="+value);

    $.ajax({
        type: "get",
        url: "/admin/search/?filter[name]="+value,


        success: function (response) {







        },
        error:function(error) {

        }
    });





    $.ajax({
        type: "get",
        url: "/admin/search/?filter[email]="+value,


        success: function (response) {


        },
        error:function(error) {
            console.log("df");
        }
    });


    console.log(result);
    console.log(result2);
    }





</script>


@endsection
