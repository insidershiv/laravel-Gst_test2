@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><p class="text-primary" id="total_users"></p> </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-2x fa-user" style="color: #4E73DF" id="card-icon1"></i>
              </div>
            </div>
            <div class="row d-flex justify-content-center ">

            <a href="{{url('/admin/view/users')}}" class="btn btn-primary">View List</a>
            </div>
          </div>
        </div>
      </div>



      <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Users</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800" ><p class="text-success" id="active_users"></p></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-2x fa-user" style="color: #1CC88A" id="card-icon2"></i>
              </div>
            </div>
            <div class="row d-flex justify-content-center ">

                <a href="{{url('/admin/view/active-users')}}" class="btn btn-success">View List</a>
                </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Blocked user</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800" ><p class="text-danger" id="blocked_users"></p></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-2x fa-user-slash text-danger" id="card-icon3"></i>
              </div>
            </div>
            <div class="row d-flex justify-content-center ">

                <a href="{{url('/admin/view/blocked-users')}}" class="btn btn-danger">View List</a>
                </div>
          </div>
        </div>
      </div>
</div>


<div>





   <script>

       var data = {!! json_encode($data) !!};

        var blocked = 0 ;
        var active = 0 ;
        var total = data.length ;

          for(i =0 ; i< data.length; i++) {

              item = data[i];

                if(item["is_active"] == 1){
                    active++;
                }
                else{
                    blocked++;
                }


          }

          console.log(active);
          console.log(blocked);
          console.log(total);

         document.getElementById("blocked_users").innerText = blocked;
         document.getElementById("active_users").innerText = active;
         document.getElementById("total_users").innerText = total;


         var mq = window.matchMedia( "(max-width: 500px)" );
        if (mq.matches) {
    // window width is at less than 570px
            document.getElementsByClassName('fa-3x').classList.add('text-danger');
            console.log("here");
        }
        else {
    // window width is greater than 570px
            }




     if (matchMedia) {
const mq = window.matchMedia("(max-width: 600px)");
mq.addListener(WidthChange);
WidthChange(mq);
}

// media query change
function WidthChange(mq) {
element1 = document.getElementById('card-icon1');
element2 = document.getElementById('card-icon2');
element3 = document.getElementById('card-icon3');
if (mq.matches) {
// window width is at least 500px




element1.classList.remove("fa-2x");

element2.classList.remove("fa-2x");

element3.classList.remove("fa-2x");


} else {
// window width is less than 500px
element1.classList.add("fa-2x");
element2.classList.add('fa-2x');
element3.classList.add('fa-2x');
}

}




   </script>
</div>
@endsection
