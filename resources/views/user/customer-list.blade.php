@extends('layouts.dashboard')
@section('title', 'customer | list')



@section('content')



<x-searchcustomer />







<div class="container d-flex align-items-center justify-content-center mt-5" id="show-table">

</div>

















<script>



    function search() {



    var value = document.getElementById('search-value').value;
       var data = [];

    $.ajax({
        type: "get",
        url: "/user/customer/search/?filter[search]="+value,


        success: function (response) {


            data = response;


            showresult(data);



        },
        error:function(error) {

        }
    });

    }




function showresult(data) {



inco = ' <div class="table-responsive card">'


+   '<table class="table mb-0">'


 +  '<thead style="background:#3F51B5;">'
  +  '<tr>'
  +   ' <th class="text-warning"> <p class="text-color-white"> # </p></th>'
   +   '<th class="th-lg"> <p><i class="fa fa-user pr-1 text-color-white " aria-hidden="true"></i></p></th>'
   +   '<th class="th-lg"> <p class="text-color-white">  Email </p> </th>'
   +   '<th class="th-lg"> <p class="text-color-white"> Company Name </p> </th>'

    +  '<th class="th-lg"> <p class="text-color-white"> Address </p> </th>'
    +  '<th class="th-lg"></th>'
    +  '<th class="th-lg"></th>'
   + '</tr>'
  + '</thead>' ;

  for(i = 0 ; i< data.length; i++) {
        item = data[i];




   temp =   '<tr>'
    + '<td>' + (i+1) + '</td>'
    + '<td>' + item["name"] + '</td>'
    + '<td>' + item["email"] + '</td>'
    + '<td>' + item["company_name"] + '</td>'


        status = '<td class="text-success">' + item["address"] + '</td>' ;
        add = '<td>'
            + '<button class="btn btn-danger ml-1 btn-sm col-md-12  col-xs-9" onclick="getall_bills(this.id)" id="' + item["id"] +'">Get Last Bill</button>'
         + '</td>'

         + '<td>'
            + '<button class="btn btn-info ml-1 btn-sm col-md-12  col-xs-9" onclick="location.href = \'/user/customer/bills/' + item["id"] + '\'"'  + 'id="' + item["id"] +'">Get All Bills</button>'
         + '</td>';


add = status + add;
add = add    + '</tr>'
temp = temp + add;
    inco = inco + temp ;




  }


 inco = inco + '</table>' ;



 document.getElementById('show-table').innerHTML = inco;





}



function getall_bills(id) {


  document.location.href = '';



}





</script>

@endsection
