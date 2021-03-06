@extends('layouts.dashboard')

@section('title', 'Inventory | Service List')



@section('content')




    <x-searchinventory>
    Search Services....
    </x-searchinventory>

    <div class="container" id="show-table">

    </div>


    @if (count($services) == 0)

    <div class="container text-center mt-5">
       
       <div>  <h5 class="text-danger">No Services</h5></div> 
       <div><h5 class="text-success mt-2">Please Start Adding Service to Inventory....</h5>
        
        <button class="btn btn-success col-6 mt-5" onclick="location.href='/user/additem'"> Add Service To Inventory <i class="fa fa-plus"></i> </button>
    
    </div>

    </div>
   
        
    @else

    <div class="container mt-5" id="default-table">


        <div class="table-responsive card">

            <!--Table-->
            <table class="table mb-0">

                <!--Table head-->
                <thead>
                    <tr>
                        <th class="text-warning">#</th>
                        <th class="th-lg">Item Name</th>
                        <th class="th-lg"> Price</th>
                        <th class="th-lg">HSN/SAC</th>
                        <th class="th-lg">Tax Slab</th>
                        <th class="th-lg">Exemption Reason</th>
                        <th class="th-lg"></th>
                        <th class="th-lg"></th>

                    </tr>
                </thead>


                @foreach ($services as $service)

                    <tbody>

                        <tr class="table-row">
                            <th>{{ $loop->iteration }}</th>
                            <td class="text-capitalize">{{ $service->item_name }}</td>
                            <td class="text-capitalize">{{ $service->item_price }}</td>
                            <td class="text-capitalize">{{ $service->item_hsn_sac }}</td>
                            <td class="text-capitalize">{{ $service->item_tax_slab }}%</td>

                            @if ($service->item_exemption == 0)
                                <td class="text-capitalize">N/A</td>


                            @endif
                            @if ($service->item_exemption == 1)
                                <td class="text-capitalize text-wrap">{{ $service->item_exemption_reason }}</td>


                            @endif

                            <td class=" text-capitalize"> <button class="btn btn-info" id="{{ $service->item_id }}"
                                    onclick="location.href='/user/item/updateform/{{ $service->id }}'">Update</button></td>

                            <td class=" text-capitalize"> <button class="btn btn-danger" onclick="delete_service(this)"
                                    id="{{ $service->id }}">Delete</button></td>

                        </tr>

                    </tbody>

                @endforeach

            </table>
        </div>

    </div>
    @endif



    <script>
        function delete_service(service) {

            console.log(service);
            id = service.id;


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/user/delete/service/" + id,
                success: function(response) {

                    swal("Successfully Deleted !", "", "success", {
                                button: "continue",
                            })
                            .then((value) => {
                                if (value)
                                //document.location.href="/user/additem";
                                location.reload();

                            });
                }
            });


        }


        function search() {
            $('#no_search_result').html('');
            var value = document.getElementById('search-value').value;
            var data = [];


            if (value.length == 0) {
                $('#default-table').show();
                $('#show-table').hide();
                return;
            }


            if (value.length != 0) {

                $('#default-table').hide();


                $.ajax({
                    type: "get",
                    url: "/user/inventory/service/search/?filter[search]=" + value,


                    success: function(response) {


                        data = response;
                        if (data.length == 0) {
                            $('#show-table').hide();
                            $('#no_search_result').html('');
                            insert = '<h5 class="text-danger">No Matching Result :(</h5>';
                            $('#no_search_result').append(insert);
                            return;
                        }
                        $('#show-table').show();
                        showresult(data);



                    },
                    error: function(error) {

                    }
                });

            }

        }



        function showresult(data) {


            var heading = '<div class="table-responsive card mt-5">' +
                '' +
                '        <!--Table-->' +
                '        <table class="table mb-0">' +
                '' +
                '            <!--Table head-->' +
                '            <thead>' +
                '                <tr>' +
                '                    <th class="text-warning">#</th>' +
                '                    <th class="th-lg">Item Name</th>' +
                '                    <th class="th-lg">Price</th>' +
                '                    <th class="th-lg">HSN/SAC</th>' +
                '                    <th class="th-lg">Tax Slab</th>' +
                '                    <th class="th-lg">Exemption Reason</th>' +
                '                    <th class="th-lg"></th>' +
                '                    <th class="th-lg"></th>' +

                '                </tr>' +
                '            </thead>';


            for (i = 0; i < data.length; i++) {
                var product = data[i];


                temp = '<tbody>' +
                    '<tr class="table-row">' +
                    '<th>' + (i + 1) + '</th>' +
                    '<td class="text-capitalize">' + product['item_name'] + '</td>' +
                    '<td class="text-capitalize">' + product['item_price'] + '</td>' +
                    '<td class="text-capitalize">' + product['item_hsn_sac'] + '</td>' +
                    '<td class="text-capitalize">' + product['item_tax_slab'] + '%' + '</td>';

                if ((product['item_exemption']) == 0) {
                    status = '<td class="text-capitalize">N/A</td>';
                }
                if ((product['item_exemption']) == 1) {
                    status = '<td class="text-capitalize text-wrap">' + product['item_exemption_reason'] + '</td>';
                }


                second = '<td class="text-capitalize"><button class="btn btn-info" id="' + product['item_id'] + '"' +
                    "onclick='location.href'=/'user/item/updateform/'";


                var myvar = '<td class="text-capitalize"> <button class="btn btn-info" id="' + product['item_id'] + '"' +
                    '                                    onclick="location.href=\'/user/item/updateform/' + product["id"] +
                    '"' + '>Update</button></td>';


                var third = '<td class="text-capitalize"> <button class="btn btn-danger" onclick="delete_product(this)"' +
                    'id="' + product['id'] + '">Delete</button></td></tbody>';

                console.log(third);


                var fourth = '</tr> </tbody>';

                var inco = temp + status + myvar + third;

                heading = heading + inco;


            }


            heading = heading + '</table>' + '</div>';

            console.log(heading);








            document.getElementById('show-table').innerHTML = heading;





        }

    </script>


@endsection
