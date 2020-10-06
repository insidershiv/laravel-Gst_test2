
    
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<link href="{{ asset('css/app.css') }}" rel="stylesheet" media="all">

<link rel="stylesheet" href="{{asset('css/invoice.css')}}" media="all">
<link href="{{asset("css/main.css")}}" rel="stylesheet" media="all">

<div class="container  pl-0 pr-0 border mt-5" id="print-area">


    <x-heading/> 
    
    <x-billto/> 
    
    <x-billdescription/>
    
    {{-- <div class="print-button mb-2">
    
    <button class="btn btn-success" id="printid" onclick="printbill()">Print </button>
    
    </div> --}}
    
    </div>

    <div class="row d-flex justify-content-center align-items-center mt-5">

    
    <button class="btn btn-success" id="printid" onclick="printbill()">Print </button>
    
</div>

    
    {{-- <button class="btn btn-primary " data-toggle = "modal" data-target="#something">Login</button> --}}
    
    
    
    

<script>


var bill_items_list = localStorage.getItem('bill-description-list');

$("#bill-section").append(bill_items_list);

var subtotal = localStorage.getItem('taxable_amount');
var total_tax = localStorage.getItem('total_tax');
var total_amount = localStorage.getItem('total_payable');

$('#subtotal_value').text(subtotal);

$('#tax_payable').text(total_tax);'bill-description-list'
$('#total_payable').text(total_amount);
word = localStorage.getItem('amount_word');
$('#amount_words').text(word);

  function printbill() {
  
// console.log(localStorage.getItem('bill-description-list'));
$('#printid').hide();
window.print();
  
  }

  
 
</script>

    
    {{--
    
        @foreach($data as $item)
    
        <li> {{$item->name}}</li>
    
        @endforeach --}}
    
    
    
