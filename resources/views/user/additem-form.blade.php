@extends('layouts.dashboard')

@section('title', 'add item')




@section('content')


    <div class=" card p-3">

        <form id="inventory_form">


            <div class="row" id="first_row">

                <div class="col-md-3 mt-2">


                    <input type="text" placeholder="Name of Item" class="form-control" name="item_name" id="item_name"
                        required>
                </div>
                <div class="col-md-2 col-6 mt-2">
                    <input type="number" name="item_price" id="item_price" placeholder="Unit Price" class="form-control"
                        required>
                </div>

                <div class=" col-md-1 col-2 mt-2" id="drop-menu">
                    <div class="dropdown" id="menu1">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Type
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2" id="item_type">
                            <button class="dropdown-item" type="button">Product</button>

                            <button class="dropdown-item" type="button">Servie</button>
                        </div>
                    </div>
                </div>

                <script>
                    selected_item_type = -1;
                    $('#item_type button').on('click', function() {

                        selected_item_type = ($(this).text());
                        element =
                            "<div class='col-md-2 col-sm-2 col-6 mt-2' id='stock_div'> <input type='number' name ='item_stock' id='item_stock' placeholder='Stock' required class='form-control'></div>"
                        $('#dropdownMenu2').text(selected_item_type);
                        if (selected_item_type == 'Product') {
                            $('#stock_div').remove();
                            $(element).insertAfter('#drop-menu');
                        } else {
                            $('#stock_div').remove();
                        }
                    })

                </script>

                <div class="col-md-2 mt-2 col-4">
                    <input type="text" class="form-control" placeholder="HSN/SAC" name="hsn_sac" id="hsn_sac">
                </div>

                <div class=" col-md-1 col-2 mt-2" id="tax-drop-menu">
                    <div class="dropdown" id="menu1">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="tax-menu" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Tax Slab
                        </button>
                        <div class="dropdown-menu" aria-labelledby="tax-menu" id="item_tax_slab">
                            <button class="dropdown-item" type="button">5%</button>

                            <button class="dropdown-item" type="button">10%</button>
                            <button class="dropdown-item" type="button">12%</button>
                            <button class="dropdown-item" type="button">18%</button>
                            <button class="dropdown-item" type="button">22%</button>
                            <button class="dropdown-item" type="button">28%</button>
                            <button class="dropdown-item text-danger" type="button">Exempt</button>
                        </div>
                    </div>
                </div>


            </div>
            

            {{--
            <div class="d-flex justify-content-left align-items-center" id="add_more">
                <button class="btn btn-primary btn-sm" id="add_more" onclick="addmore_row(event)">Add More <i
                        class="fa fa-plus"></i></button>
            </div> --}}


            <div class="d-flex justify-content-center align-items-center mt-3" id="submit_button">

                {{-- <button class="btn btn-success col-md-2" onclick="submit_item(event)">
                    Add
                </button> --}}


                <input type="submit" class="btn btn-success" value="Add" name="submit">
            </div>


        </form>




    </div>



        <input type="text" name="" id="" value="{{Auth::user()->id}}" hidden>

    <script>
        item_tax = -1;
        $('#item_tax_slab button').on('click', function() {
            item_tax = ($(this).text());
            element =
                "<div class='row d-flex justify-content-center' id='reason-div'> <div class='col-md-6 col-sm-2 col-10 mt-2 '> <input type='text' name ='exempt_reason' id='exempt_reason' placeholder='Specicy Reason of Exemption' required class='form-control'></div></div>"
            $('#tax-menu').text(item_tax);
            if (item_tax == 'Exempt') {
                $('#reason-div').remove();
                $(element).insertBefore('#submit_button');
            } else {
                $('#reason-div').remove();
            }

        })



        $('#inventory_form').submit(function(e) {


            e.preventDefault();
            item_name = $('#item_name').val();
            item_price = $('#item_price').val();
            item_stock = $('#item_stock').val();
            item_hsn_sac = $('#hsn_sac').val();
            //selected_item_type is the type of item product or service
            //item_tax is tax slab for the item

            if (item_tax == -1) {
                swal({
                    title: "Please Select Tax Slab",
                   
                    icon: "warning",
                    button: "Ok",
                });
            }

            if (selected_item_type == -1) {
                swal({
                    title: "Please Select Type Of Item",
                   
                    icon: "warning",
                    button: "Ok",
                });
            }

        


            if (item_tax == 'Exempt') {
                exempt_reason = $('#exempt_reason').val();

            }



        })

    </script>

@endsection
