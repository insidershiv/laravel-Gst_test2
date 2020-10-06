@extends('layouts.dashboard')
@section('title', 'customer | list')



@section('content')



    <x-searchcustomer>

        Search Customer...

    </x-searchcustomer>




    <div class="container d-flex align-items-center justify-content-center mt-5" id="show-table">

    </div>

    @if (count($data) == 0)


        <div class="container text-center mt-5">

            <div>
                <h5 class="text-danger">No Customers</h5>
            </div>
            <div>
                <h5 class="text-success mt-2">Please Start Adding Customers....</h5>

                <button class="btn btn-success col-6 mt-5" onclick="location.href='/user/new_customer'"> Add Customers
                    <i class="fa fa-plus"></i> </button>

            </div>

        </div>

    @else
<div class="container d-flex justify-content-center">
    
<p class="text-primary" id="click-message"> Click on Customer's Name to view Information About Customer</p>

</div>
    <div class="container d-flex align-items-center justify-content-center mt-5">



        <div class="table-responsive card" id="first-table">
            <table class="table mb-0">
                <thead style="background:#3F51B5;">
                    <tr>
                        <th class="text-warning">
                            <p class="text-color-white"> # </p>
                        </th>
                        <th class="th-lg">
                            <p><i class="fa fa-user pr-1 text-color-white " aria-hidden="true"></i></p>
                        </th>
                        <th class="th-lg">
                            <p class="text-color-white"> Email </p>
                        </th>
                        <th class="th-lg">
                            <p class="text-color-white"> Company Name </p>
                        </th>
                        <th class="th-lg">
                            <p class="text-color-white"> Address </p>
                        </th>
                        <th class="th-lg"></th>
                        <th class="th-lg"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $customer)


                        <tr>
                            <td>{{ $loop->iteration }}</td>
                        <td> <a href="/user/view/customer/{{$customer->id}}">{{ $customer->name }}</a></td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->company_name }}</td>
                            <td class="text-success">{{ $customer->address }}</td>
                            <td>
                               

                                    <a href="/user/view/lastbill/{{$customer->id}}" class="btn btn-danger ml-1 btn-sm col-md-12  col-xs-9" target="_blank">Get Last Bill</a>

                                </td>
                            <td><button class="btn btn-info ml-1 btn-sm col-md-12  col-xs-9"
                                    onclick="location.href = '/user/customer/bills/{{ $customer->id }}'"
                                    id="{{ $customer->id }}">Get All Bills</button></td>
                        </tr>


                    @endforeach
                </tbody>
            </table>
        </div>





    </div>



    @endif






    <script>
        function search() {

            document.getElementById('first-table').style.display = "none";
            $('#click-message').hide();

            var value = document.getElementById('search-value').value;
            var data = [];

            $.ajax({
                type: "get",
                url: "/user/customer/search/?filter[search]=" + value,


                success: function(response) {
                  $('#click-message').hide();

                    data = response;

                    if (data.length == 0) {



                        element =
                            "<h5 class='text-danger strong'>  No Result Found. Please Change Your Search Query. </h5>  ";



                        document.getElementById('show-table').innerHTML = element;

                    } else {
                     $('#click-message').show();
                        showresult(data);

                    }





                },
                error: function(error) {

                }
            });

        }




        function showresult(data) {


            $('#click-message').show();


            inco = ' <div class="table-responsive card">'


                +
                '<table class="table mb-0">'


                +
                '<thead style="background:#3F51B5;">' +
                '<tr>' +
                ' <th class="text-warning"> <p class="text-color-white"> # </p></th>' +
                '<th class="th-lg"> <p><i class="fa fa-user pr-1 text-color-white " aria-hidden="true"></i></p></th>' +
                '<th class="th-lg"> <p class="text-color-white">  Email </p> </th>' +
                '<th class="th-lg"> <p class="text-color-white"> Company Name </p> </th>'

                +
                '<th class="th-lg"> <p class="text-color-white"> Address </p> </th>' +
                '<th class="th-lg"></th>' +
                '<th class="th-lg"></th>' +
                '</tr>' +
                '</thead>';

            for (i = 0; i < data.length; i++) {
                item = data[i];




                temp = '<tr>' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + '<a href="/user/view/customer/'+  item["id"] + '">'  + item["name"] + '</a>' + '</td>' +
                    '<td>' + item["email"] + '</td>' +
                    '<td>' + item["company_name"] + '</td>'


                status = '<td class="text-success">' + item["address"] + '</td>';
                add = '<td>' +
                    '<button class="btn btn-danger ml-1 btn-sm col-md-12  col-xs-9" onclick="getall_bills(this.id)" id="' +
                    item["id"] + '">Get Last Bill</button>' +
                    '</td>'

                    +
                    '<td>' +
                    '<button class="btn btn-info ml-1 btn-sm col-md-12  col-xs-9" onclick="location.href = \'/user/customer/bills/' +
                    item["id"] + '\'"' + 'id="' + item["id"] + '">Get All Bills</button>' +
                    '</td>';


                add = status + add;
                add = add + '</tr>'
                temp = temp + add;
                inco = inco + temp;




            }


            inco = inco + '</table>';



            document.getElementById('show-table').innerHTML = inco;





        }




    </script>

@endsection
