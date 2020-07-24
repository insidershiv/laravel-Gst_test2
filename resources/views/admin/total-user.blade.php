@extends('layouts.dashboard')

@section('title', 'Total|Users')




@section('content')


    <div class="text-center"><h4 class="text-primary">All Users</h4></div>

<div class="container d-flex justify-content-center mt-5">

    <div class="table-responsive card">

        <!--Table-->
        <table class="table mb-0">

          <!--Table head-->
          <thead>
            <tr>
              <th class="text-warning">#</th>
              <th class="th-lg"> <i class="fa fa-user pr-1" aria-hidden="true"></i>UserName</th>
              <th class="th-lg"> Email</th>
              <th class="th-lg">Company Name</th>

              <th class="th-lg">Status</th>
              <th class="th-lg"></th>
            </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>

            @foreach ($data as $item)


            @if ( $loop->iteration %2 ==0)

            <tr class="table-row">
                <th>{{ $loop->iteration }}</th>
            <td class="text-capitalize">{{$item->name}}</td>
                <td class="text-capitalize">{{$item->email}}</td>
                <td class="text-capitalize">{{$item->company_name}}</td>



@if (($item->is_active) == 0)
    <td class="text-danger">Blocked

    </td>

    <td>
    <button class="btn btn-success ml-1 btn-sm col-md-8 col-sm-9 col-xs-9"  onclick="changestatus(this.id)" id="{{$item->id}}">Activate</button>
    </td>
@else
    <td class="text-success">Active

    </td>

    <td>
    <button class="btn btn-danger ml-1 btn-sm col-md-8" onclick="changestatus(this.id)" id="{{$item->id}}">Block</button>
    </td>

@endif






              </tr>




            @else

            <tr class="table-row">
                <th>{{ $loop->iteration }}</th>
            <td class="text-capitalize">{{$item->name}}</td>
                <td class="text-capitalize">{{$item->email}}</td>
                <td class="text-capitalize">{{$item->company_name}}</td>



@if (($item->is_active) == 0)
    <td class="text-danger">Blocked

    </td>
<td><button class="btn btn-success ml-1 btn-sm col-md-8 col-xs-9" onclick="changestatus(this.id)" id="{{$item->id}}">Activate</button></td>
@else
    <td class="text-success">Active

    </td>
    <td>
    <button class="btn btn-danger ml-1 btn-sm col-md-8 " onclick="changestatus(this.id)"  id="{{$item->id}}">Block</button>
    </td>
@endif



            @endif







            @endforeach




          </tbody>
          <!--Table body-->

        </table>
        <!--Table-->

      </div>




</div>




<script>


function changestatus(id) {


$.ajax({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    type:"POST",
    url: "/admin/update/status/"+id,
    data: {},

    success: function (response) {
        location.reload();
    }
});




}



</script>



@endsection
