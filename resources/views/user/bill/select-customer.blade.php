@extends('layouts.dashboard')

@section('title', 'Bill | Customer')



@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


@if (session()->has('selected_customer'))
    {{session()->forget('selected_customer')}}
@endif

  


    <script>
        var customers = {!! $customers !!};


        console.log(customers);
        var source = customers;
        var data = [];
        for (i = 0; i < customers.length; i++) {
            data[i] = (customers[i]["name"]).toUpperCase() + ' ( ' + (customers[i]["company_name"]).toUpperCase() + ' )';

        }



        source = data;

        // $("#tags").autocomplete({
        //     source: availableTags
        // });
    
       


        function autocompletelistner(event, ui) {
            if (ui.content.length === 0) {
                current = $(this);
                spanparent = (current.parent());
                childs = spanparent.children();
                child = (childs[1]);
                $(child).removeClass("product-btn");
                match = false;
                $("#empty-message").text("No results found");

            } else {
                $("#empty-message").empty();


            }
        }


        function selecteditem(event, ui) {
            // item has been selected from drop down (autocomplete)
         
            pname = ui.item.label;

            var temp = pname.split(' (');
            var name = (temp[0]).trim();
            var company_name = temp[1];
            company_name = company_name.split(' )');
            company_name = company_name[0].trim();
            console.log(company_name);
            console.log(name);


            $.ajax({
                type: "GET",
                url: "/user/bill/get/customer",
                data: {
                    'name': name,
                    'company_name': company_name
                },

                success: function(response) {
                    data = JSON.parse(response);
                   var customer = (data[0]);
                   
                   $('#customer-data').empty();
                     myvar = '<div class="row" id="customer-content">' +
                        '' +
                        '    <div class="col-md-1 col-4 text-primary">Customer: </div>' +
                        '<div class="offset-md-1 col-md-3 col-6 text-secondary text-capitalize">' +  customer["name"] + '</div>' +
                        '' +
                        '<div class="offset-md-1 col-md-1 text-primary col-4">Email: </div>' +
                        '<div class="col-md-3 text-capitalize text-secondary col-6">'+ customer["email"]  +'</div>' +
                        '</div>' +
                        '' +
                        '<div class="row">' +
                        '' +
                        '    <div class="col-md-1 text-primary col-4">Company: </div>' +
                        '<div class="offset-md-1 col-md-3 text-secondary text-capitalize col-6">' + customer["company_name"] + '</div>' +
                        '' +
                        '<div class="offset-md-1 col-md-1 text-primary col-4">Address: </div>' +
                        '<div class="col-md-4 text-capitalize text-secondary col-6">'+ customer['address'] + '</div>' +
                        '</div>' +
                        '' +
                        '<div class="row">' +
                        '' +
                        '    <div class="col-md-1 text-primary col-4">State: </div>' +
                        '<div class="offset-md-1 col-md-3 text-secondary text-capitalize col-6">' + customer["state"]    +'</div>' +
                        '' +
                        '<div class="offset-md-1 col-md-1 text-primary col-4">City: </div>' +
                        '<div class="col-md-4 text-capitalize text-secondary col-6">'+ customer["city"]  + '</div>' +
                        '</div>'+
                        '' +
                        '<div class="row">' +
                        '' +
                        '    <div class="col-md-1 text-primary col-4">Pincode: </div>' +
                        '<div class="offset-md-1 col-md-3 text-secondary text-capitalize col-6">' + customer["pincode"]    +'</div>' +
                        '' +
                        '<div class="offset-md-1 col-md-1 text-primary col-4">Country: </div>' +
                        '<div class="col-md-4 text-capitalize text-secondary col-6">'+ customer["country"]  + '</div>' +
                        '</div>';




                $('#customer-data').append(myvar);

                $('#continue-button').removeAttr('hidden');










                },
                error: function(xhr) {
                    console.log("error");
                }
            });




        }





        function addautocomplete(obj) {
            $(obj).autocomplete({
                source,
                response: autocompletelistner,
                select: selecteditem
            });
            // $(obj).keyup(showproductbtn);
          
        }

    </script>


    {{--
    <div class="ui-widget">
        <label for="tags">Tags: </label>
        <input id="tags">
    </div> --}}


    <div class="container d-flex justify-content-center">

        <div class="card col-lg-12 text-center p-3">

            <p class="h5 text-warning"> <u> &nbsp &nbsp Search And Select Customer To Proceed...... &nbsp &nbsp</u></p>


        </div>

    </div>

    <div class="container mt-5">


        <div class="row d-flex justify-content-center">


            <div class="col-md-6">



                <input type="text" class="form-control text-capitalize" onclick="addautocomplete(this)"
                    placeholder="Start Typing customer's Name">
            </div>
        </div>
    </div>


    <div class="container mt-5 card" id="customer-data">


        {{-- <div class="row">

            <div class="col-md-2">Customer Name</div>
            <div class="offset-1 col-md-3">My name is</div>

            <div class="offset-1">Email:</div>
            <div class="col-md-4">my email</div>
        </div>

        <div class="row">

            <div class="col-md-2">Company Name</div>
            <div class="offset-1 col-md-3">My name is</div>

            <div class="offset-1">Address</div>
            <div class="col-md-4">my email</div>
        </div>

        <div class="row">

            <div class="col-md-2">Company Name</div>
            <div class="offset-1 col-md-3">My name is</div>

            <div class="offset-1">Address</div>
            <div class="col-md-4">my email</div>
        </div> --}}
    </div>


    <div class="container mt-5 d-flex justify-content-center"  hidden="true">
        <button class="btn btn-success" hidden id="continue-button" onclick="location.href='/user/bill/additems'"> Click To Continue With Bill...</button>
    </div>






@endsection
