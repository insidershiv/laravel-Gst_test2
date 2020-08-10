@extends('layouts.dashboard')

@section('content')

<div class="row">



<div class="col-lg-8 col-12">
    <div class="card border-left-primary shadow">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col-3 mr-2">
            <div class=" text-primary text-uppercase mb-1">Total Customers</div>

          </div>
          <div class=" col-2 text-xscol-sm-3 text-primary font-weight-bold text-uppercase">: 250</div>
          <div class="col-2">
            <a href="{{url('/user/view/customers')}}" class="text-primary">View List</a>
          </div>
          <div class="col-4 ml-auto">
            <button class="btn btn-danger btn-sm" onclick="location.href='/user/new_customer'">Add new customer <i class="fa fa-plus"></i></button>
        </div>
        </div>


      </div>
    </div>
  </div>

  <div class="ml-5 mb-5">


</div>



</div>


<div class="row mt-5">
    <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Invoice</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><p class="text-primary" id="total_users">45</p> </div>
              </div>
              <div class="ml-auto">

                <a href="{{url('/admin/view/users')}}" class="btn btn-primary btn-sm">View List</a>
                </div>
            </div>

          </div>
        </div>
      </div>



      <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col- mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Invoices Generated</div>

                <div class="h5 mb-0 font-weight-bold text-gray-800"><p class="text-primary" id="total_users">45</p> </div>


              </div>

              <div class="ml-auto">

                <a href="{{url('/admin/view/active-users')}}" class="btn btn-success btn-sm">View List</a>
                </div>

            </div>

          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Invoices Generated</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800" ><p class="text-danger" id="blocked_users">89</p></div>
              </div>
              <div class="ml-auto">
                <a href="{{url('/admin/view/blocked-users')}}" class="btn btn-danger btn-sm">View List</a>
              </div>
            </div>

          </div>
        </div>
      </div>
<hr>
</div>


<div class="mt-5">

    <div class="offset-md-1">


        <h4 class="text-warning"><u>Sales Info (Overall) </u></h4>
    </div>

        <div class="row mt-5">

            <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
                <div class="card border-left-blue shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-blue text-uppercase mb-1">Total Amount</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><p class="text-primary" id="total_users"></p> </div>
                      </div>

                    </div>

                  </div>
                </div>
              </div>



              <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
                <div class="card border-left-orange shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">Total GST</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" ><p class="text-success" id="active_users"></p></div>
                      </div>
                      <div class="col-auto">

                      </div>
                    </div>

                  </div>
                </div>
              </div>


              <div class="col-xl-4 col-md-4 mb-4 col-sm-6 col-6">
                <div class="card border-left-voilet shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-voilet text-uppercase mb-1">Sales Amount</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" ><p class="text-danger" id="blocked_users"></p></div>
                      </div>
                      <div class="col-auto">
                      </div>
                    </div>

                  </div>
                </div>
              </div>




        </div>




</div>





@if(session()->has('creation_successfull'))


<div id="myModal2" class="modal fade">
  <div class="modal-dialog modal-confirm">
      <div class="modal-content">
          <div class="modal-header justify-content-center">

              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body text-center">

              <p> Customer Added Successfully</p>
              <button class="btn btn-success" data-dismiss="modal">Continue</button>
          </div>
      </div>
  </div>
</div>








@endif

<script>
 if($("#myModal2")) {
        $("#myModal2").modal('show');
    }
</script>



@endsection
