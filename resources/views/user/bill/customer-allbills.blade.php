@extends('layouts.dashboard')

@section('content')



@if (($no_data) == 1)


<div class="container text-center mt-5">

    <div>
        <h5 class="text-danger">No Bills Yet..</h5>
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
                    <p class="text-color-white"> Invoice ID </p>
                </th>
                <th class="th-lg">
                    <p class="text-color-white">Bill Amount</p>
                </th>
                <th class="th-lg">
                    <p class="text-color-white">Date</p>
                </th>
              
              
                <th class="th-lg"></th>
               
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $customer)


                <tr>
                    <td>{{ $loop->iteration }}</td>
                <td class="text-capitalize"> <a href="/user/view/customer/{{$customer->id}}">{{ $customer->customer_name }}</a></td>
                    <td>{{ $customer->invoice_id }}</td>
                    <td>{{ $customer->amount }}</td>
                    <td>{{ $customer->created_at }}</td>

                   
                   
                    {{-- <td><button class="btn btn-danger ml-1 btn-sm col-md-12  col-xs-9"
                            onclick="get_bill(this.id)" id="{{ $customer->invoice_id }}">    <a href="" target></a>           View Bill</button></td> --}}
                   
                            <td>
                                
                        <a href="/user/viewbill/{{$customer->invoice_id}}" class="btn btn-danger ml-1 btn-sm col-md-12  col-xs-9" target="_blank">View Bill</a>

                    </td>

                </tr>


            @endforeach
        </tbody>
    </table>
</div>





</div>



@endif





<script>


    function get_bill(id) {

    location.href='/user/viewbill/'+ id;


      }



</script>






@endsection