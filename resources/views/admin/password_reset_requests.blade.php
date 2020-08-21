@extends('layouts.dashboard')

@section('content')

<div class="container d-felx justify-content-center align-items-center">

    <h4 class="text-danger text-center">Pending Password Reset Requests</h4>


    @if(count($data) == 0 )

  <div class="container text-center mt-5">

    <div class="card p-5">
        <div class="card-title">
            No Pending Requests
        </div>
    </div>

  </div>

    @else

<div class="table-responsive card mt-5">

    <!--Table-->
    <table class="table mb-0">

      <!--Table head-->
      <thead>
        <tr>
          <th class="text-warning">#</th>


          <th class="th-lg text-center">Email </th>

          <th class="th-lg text-center"></th>
        </tr>
      </thead>
      <!--Table head-->

      <!--Table body-->
      <tbody>

        @foreach ($data as $item)


        @if ( $loop->iteration %2 ==0)

        <tr class="table-row">
            <th>{{ $loop->iteration }}</th>

            <td class="text-capitalize text-center">{{$item->email}}</td>

            <td class="text-center"> <button class="btn btn-warning btn-sm" onclick="location.href='/admin/password_resetform/{{$item->id}}'">Change Password</button></td>

        </tr>



        @else

        <tr class="table-row">
            <th>{{ $loop->iteration }}</th>

            <td class="text-capitalize text-center">{{$item->email}}</td>
            <td class="text-center"> <button class="btn btn-warning btn-sm" onclick="location.href='/admin/password_resetform/{{$item->id}}'">Change Password</button></td>

        </tr>



        @endif

        @endforeach

      </tbody>

    </table>
</div>


</div>


@endif

@endsection
