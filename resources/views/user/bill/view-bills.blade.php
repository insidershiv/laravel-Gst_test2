@extends('layouts.dashboard')

@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="container" id="attach">

    <div class="d-flex justify-content-center align-items-center mb-5">
        <p class="h5 text-warning">
            Select Date Range To view bills during the duration
        </p>
    </div>
   
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-2 d-flex align-items-center">
                <label for="select Date Range" class="text-secondary">Select Date Range:</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="daterange" class="form-control" />
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center mt-3">

            <button class="btn btn-success btn-sm d-block" id="get_bills">
                Get All Bills
            </button>
        </div>
       

    </div>
</div>



<script>
   var  start_date = '';
   var end_date = '';
$(function() {
   
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    start_date =start.format('YYYY-MM-DD');
    end_date = end.format('YYYY-MM-DD');
  });
});

$('#get_bills').click(function() {

    console.log(start_date, end_date);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/user/getbills/date",
        data: {"start_date":start_date, "end_date":end_date},
        
        success: function (response) {
         data = response ;
         count = 1;
         console.log(data);


var myvar = '<div class="container d-flex align-items-center justify-content-center mt-5">'+

'<div class="table-responsive card" id="first-table">'+
'    <table class="table mb-0">'+
'        <thead style="background:#3F51B5;">'+
'            <tr>'+
'                <th class="text-warning">'+
'                    <p class="text-color-white"> # </p>'+
'                </th>'+
'                <th class="th-lg">'+
'                    <p><i class="fa fa-user pr-1 text-color-white " aria-hidden="true"></i></p>'+
'                </th>'+
'                <th class="th-lg">'+
'                    <p class="text-color-white"> Invoice ID </p>'+
'                </th>'+
'                <th class="th-lg">'+
'                    <p class="text-color-white">Bill Amount</p>'+
'                </th>'+
'                <th class="th-lg">'+
'                    <p class="text-color-white">Date</p>'+
'                </th>'+
'              '+
'              '+
'                <th class="th-lg"></th>'+
'               '+
'            </tr>'+
'        </thead>'+
'        <tbody>';


var items = '';
for(i =0 ; i<data.length; i++) {


     items =  items +   '<tr>'+
'                    <td>' + count +  '</td>'+
'                <td class="text-capitalize"> <a href="/user/view/customer/'+ data[i]["customer_id"]  + '">' + data[i]["customer_name"] +'</a></td>'+
'                    <td>'+  data[i]["invoice_id"]+ '</td>'+
'                    <td>'+ data[i]["amount"]+ '</td>'+
'                    <td>' + data[i]["created"] +  '</td>'+
''+
'                   '+
'                   '+
'                    {{-- <td><button class="btn btn-danger ml-1 btn-sm col-md-12  col-xs-9"'+
'                            onclick="get_bill(this.id)" id="'+ data[i]["customer_id"] +'">    <a href="" target></a>           View Bill</button></td> --}}'+
'                   '+
'                            <td>'+
'                                '+
'                        <a href="/user/viewbill/' +  data[i]["invoice_id"] +'" class="btn btn-danger ml-1 btn-sm col-md-12  col-xs-9" target="_blank">View Bill</a>'+
''+
'                    </td>'+
''+
'                </tr>';


	






}

var inc = myvar + items + '  </tbody>  </table> </div>';


        $('#attach').append(inc);



        }
    });
})

</script>

    
@endsection