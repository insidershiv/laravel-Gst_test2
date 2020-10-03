@extends('layouts.dashboard')

@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="container">

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
                <input type="text" name="daterange" class="form-control" value="c"/>
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
    console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
    start_date =start.format('DD-MM-YYYY');
    end_date = end.format('DD-MM-YYYY');
  });
});

$('#get_bills').click(function() {

    console.log(start_date, end_date);

    $.ajax({
        type: "POST",
        url: "/user/getbills/date",
        data: {"start_date":start_date, "end_date":end_date},
        
        success: function (response) {
            
        }
    });
})

</script>


    
@endsection