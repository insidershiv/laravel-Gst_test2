@extends('layouts.dashboard')

@section('title', 'inventory')


@section('content')



<div class="container mb-3">
    <div class="row">
        <div class="offset-1">
        <button class="btn btn-primary btn-sm" onclick="location.href='/user/additem'">Add New Item To Inventory <i class="fa fa-plus"></i> </button>
    </div>
    </div>

</div>

    <div class="row">



        <div class="col-lg-10 col-md-12 mx-auto">

            <div class="card">




                <div class="card-body">

                  <div class="row">



                    <div class="text-center mx-auto">
                        <p class="h4 text-warning">Inventory</p>
                    </div>


                  </div>
                    <div class="container">
                    <div class="row mt-5">
                        <div class="text-info offset-md-2 col-sm-4 col-md-4 col">

                            <p class="h6">Total Inventory Item</p>

                        </div>

                        <div class="col-sm-4 col-md-3 col">
                            <p class="text-success">55</p>
                        </div>
                        <div class=" col-sm-4 col-md-3 col">
                          <button class="btn btn-danger btn-sm btn-block">view inventory</button>
                        </div>
                    </div>

                    <div class="row mt-5">


                        <div class="text-info offset-md-2 col-sm-4 col-md-4 col">
                            <p class="h6">Total Products</p>

                        </div>

                        <div class="col-sm-4 col-md-3 col">
                          <p class="text-success">25</p>
                        </div>

                        <div class="col-sm-4 col-md-3 col">
                          <button class="btn btn-danger btn-sm btn-block">View Products</button>
                        </div>




                    </div>



                    <div class="row mt-5">


                      <div class="text-info offset-md-2 col-sm-4 col-md-4 col">
                          <p class="h6">Total Services</p>

                      </div>

                      <div class="col-sm-4 col-md-3 col">
                        <p class="text-success">25</p>
                      </div>

                      <div class="col-sm-4 col-md-3 col">
                        <button class="btn btn-danger btn-sm btn-block">view Services</button>
                      </div>




                  </div>







                    </div>

                </div>

            </div>


        </div>





    </div>

@endsection
