@extends('layouts.dashboard')

@section('content')


<x-search />



<div class="container d-flex align-items-center justify-content-center mt-5" id="show-table">

</div>




<script>

    function search() {


    var value = document.getElementById('search-value').value;
       var data = [];

    $.ajax({
        type: "get",
        url: "/admin/search/?filter[search]="+value,


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

    +  '<th class="th-lg"> <p class="text-color-white"> Status </p> </th>'
    +  '<th class="th-lg"></th>'
    +  '<th class="th-lg"></th>'
   + '</tr>'
  + '</thead>' ;

  for(i = 0 ,j = 0; i< data.length; i++) {
        item = data[i];

        if(item["is_admin"] == 1){
            j = 0;
            continue;
        }else {


   temp =   '<tr>'
    + '<td>' + (j+1) + '</td>'
    + '<td>' + item["name"] + '</td>'
    + '<td>' + item["email"] + '</td>'
    + '<td>' + item["company_name"] + '</td>'


    if((item["is_active"]) == 0) {

        status = '<td class="text-danger">' + 'Blocked' + '</td>' ;

        add = '<td>'
            + '<button class="btn btn-success ml-1 btn-sm col-md-12  col-xs-9" onclick="changestatus(this.id)" id="' + item["id"] +'">Activate</button>'
         + '</td>'
         + '<td>'
            + '<button class="btn btn-info ml-1 btn-sm col-md-12  col-xs-9" onclick="location.href = \'/admin/update/user/' + item["id"] + '\'"'  + 'id="' + item["id"] +'">Update</button>'
         + '</td>';

    }else {
        status = '<td class="text-success">' + 'Active' + '</td>' ;
        add = '<td>'
            + '<button class="btn btn-danger ml-1 btn-sm col-md-12  col-xs-9" onclick="changestatus(this.id)" id="' + item["id"] +'">Block</button>'
         + '</td>'

         + '<td>'
            + '<button class="btn btn-info ml-1 btn-sm col-md-12  col-xs-9" onclick="location.href = \'/admin/update/user/' + item["id"] + '\'"'  + 'id="' + item["id"] +'">Update</button>'
         + '</td>';
    }

add = status + add;
add = add    + '</tr>'
temp = temp + add;
    inco = inco + temp ;


}

  }


 inco = inco + '</table>' ;



 document.getElementById('show-table').innerHTML = inco;





}



function changestatus(id) {


    $.ajax({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    type:"POST",
    url: "/admin/update/status/"+id,
    data: {},

    success: function (response) {

        search()

    }
});




}





</script>


@endsection
