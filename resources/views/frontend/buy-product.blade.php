@extends('frontend.master')
@section('content')
<style>
    .order-form .container {
      color: #4c4c4c;
      padding: 20px;
      box-shadow: 0 0 10px 0 rgba(0, 0, 0, .1);
    }
    .order-form-label {
      margin: 8px 0 0 0;
      font-size: 14px;
      font-weight: bold;
    }
    .order-form-input {
      width: 100%;
      padding: 8px 8px;
      border-width: 1px !important;
      border-style: solid !important;
      border-radius: 3px !important;
      font-family: 'Open Sans', sans-serif;
      font-size: 14px;
      font-weight: normal;
      font-style: normal;
      line-height: 1.2em;
      background-color: transparent;
      border-color: #cccccc;
    }
    .btn-submit:hover {
      background-color: #090909 !important;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
        <strong>
            <a class="btn btn-success" href="{{ url('razorpay-payment') }}">Add Points</a><br><br>
        </strong>
</div>
@endif


<!-- @if (session()->has('success'))
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('success') !!}
            <a class="btn btn-success" href="{{ url('razorpay-payment') }}">Add Points</a><br><br>
            <label>Refer and Earn coins.</label>
              <input style="display: none;" type="text" value="{{ url('registers/'.$finalid) }}" id="myInput" readonly="">
              <button class="btn btn-success" onclick="myFunction()">Copy Link</button>
              <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=whatsappphonenumber&text=urlencodedtext">Share on Whatsapp</a>
        </strong>
    </div>
@endif -->

<form method='post' action="{{url('order')}}">
  @csrf
  @if(session()->has('message'))
        <div class="modal" tabindex="-1">
        <div class="modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Esito caricamento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>{{ session()->get('message') }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      @endif
<section class="order-form my-4 mx-4">
    <div class="container pt-4">
   
      <div class="row">
        <div class="col-12">
          <h1>Add Order Details</h1>
          <hr class="mt-1">
        </div>
        <div class="col-12">
          <div class="row mx-4">
          <div class="col-12 mb-2">
              <label class="order-form-label">Amount</label>
              <input class="order-form-input" name="amount" placeholder="" value="{{$check}}" readonly>
            </div>
            <div class="col-12 mb-2">
              <label class="order-form-label">Name</label>
            </div>
            <div class="col-12 col-sm-6">
              <input class="order-form-input" name="first_name" placeholder="First">
            </div>
            <div class="col-12 col-sm-6 mt-2 mt-sm-0">
              <input class="order-form-input" name="last_name" placeholder="Last">
            </div>
          </div>

          <div class="row mt-3 mx-4">
            <div class="col-12">
              <label class="order-form-label">Type of thing you want to order</label>
            </div>
            <div class="col-12">
              <input class="order-form-input" name="thing_you_want_to_order" placeholder=" ">
            </div>
          </div>

          <div class="row mt-3 mx-4">
            <div class="col-12">
              <label class="order-form-label">Another type of thing you want to order</label>
            </div>
            <div class="col-12">
              <input class="order-form-input" class="thing_you_want_to_order" placeholder=" ">
            </div>
          </div>

          <div class="row mt-3 mx-4">
            <div class="col-12">
              <label class="order-form-label" for="date-picker-example">Date</label>
            </div>
            <div class="col-12">
              <input type="date" class="order-form-input datepicker" name="DOB" placeholder="Selected date" type="text"
                id="date-picker-example">
            </div>
          </div>

          <div class="row mt-3 mx-4">
            <div class="col-12">
              <label class="order-form-label">Address</label>
            </div>
            <div class="col-12">
              <input class="order-form-input" name="street_address" placeholder="Street Address">
            </div>
            <div class="col-12 mt-2">
              <input class="order-form-input" name="" placeholder="Street Address Line 2">
            </div>
            <div class="col-12 col-sm-6 mt-2 pr-sm-2">
              <input class="order-form-input" name="city" placeholder="City">
              <input type="hidden" class="order-form-input" name="amount" value="{{$check}}" placeholder="City">
            </div>
            <div class="col-12 col-sm-6 mt-2 pl-sm-0">
              <input class="order-form-input" name="region" placeholder="Region">
            </div>
            <div class="col-12 col-sm-6 mt-2 pr-sm-2">
              <input class="order-form-input" name="pin_code" placeholder="Postal / Zip Code">
            </div>
            <div class="col-12 col-sm-6 mt-2 pl-sm-0">
              <input class="order-form-input" name="country" placeholder="Country">
            </div>
            <div class="col-12 col-sm-6 mt-2 pr-sm-2">
              <input class="order-form-input" name="contact" placeholder="Contact">
            </div>
          </div>

          <div class="row mt-3 mx-4">
            <div class="col-12">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="validation" id="validation" value="1" required>
                <label for="validation" class="form-check-label">I know what I need to know</label>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12">
              <button type="submit" id="btnSubmit" name='submit' class="btn btn-dark d-block mx-auto btn-submit">Submit</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</form>
@endsection
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  alert("Copied the text: " + copyText.value);
}
</script>
