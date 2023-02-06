@extends('admin.master')
@section('content')
@if(count($data)>0)

@foreach($data as $data)  
<section class="container-fluid cont-area">
   <div class="container">
   <div class="row justify-content-center functn">
      <div class="col-md-12">
         
         <!-- -------------
            online Address
            ---------------->
         <div class="row justify-content-center">
            <div class="col-md-10 offset-md-1">
               <!-- form complex example -->
               <div class="card card-outline-secondary">
                  <div class="card-header"  style="background-color: #343a40;">
                     <h5 class="mb-0" style="background-color: #343a40; color: #FFFFFF;">Bank Detail</h5>
                     <a href="{{ url('update-bank/'.$data->id) }}" style="float: right;margin-top: -30px;" class="btn btn-success" title="Update">Update </a>
                  </div>
                  <div class="card-body">
                        <div class="col-sm-6">
                          <div class="card-header">
                            <ul>
                                <li><strong>Bank Name : </strong>{{$data->bankname}}</li>
                                <li><strong>Account No : </strong>{{$data->account_no}}</li>
                                <li><strong>Name : </strong>{{$data->firstname}} {{$data->lastname}}</li>
                                <li><strong>Branch Code : </strong>{{$data->branchcode}}</li>
                                <li><strong>Account Type : </strong>{{$data->accounttype}}</li>
                            </ul>
                          </div>
                           <div class="card-header">
                                <ul>
                                    <li><strong>Address : </strong>{{$data->streetaddress}}, {{$data->city}},  {{$data->zipcode}}</li>
                                    <li><strong>Country : </strong>{{$data->country}}</li>
                                    <li><strong>Pan Card No. : </strong><?php echo ''.substr_replace($data->panno, str_repeat("X", 8), 4, 8);  ?></li>
                                    <li><strong>Aadhar No. : </strong>  <?php echo ''.substr_replace($data->aadharno, str_repeat("X", 8), 4, 8);?></li>
                                    <li><strong>Contact : </strong>{{$data->contact}}</li>
                                    <li><strong>Email : </strong>{{$data->emailaddress}}</li>
                                </ul>
                           </div>
                          </div>
                  </div>
                  <div class="card-header">
                     <div class="float-right">
                     <!--  <input class="btn btn-primary" type="button" value="Pay"> -->
                     </div>
                  </div>
               </div>
               <!--/card-->
            </div>
         </div>
         <!--/row-->
      </div>
   </div>
</section>
@endforeach

@else
<div class="container" style="width: 90%;">
@if (\Session::has('success'))
<div class="alert alert-success">
   <ul>
      <li>
         {!! \Session::get('success') !!}
      </li>
   </ul>
</div>
@endif
<h5 style="col-md-3">Bank Details</h5>
<form class="requires-validation" novalidate method="POST" action="{{ url('bank-detail') }}">
   @csrf
   <div class="mt-2 col-6">
      <input class="form-control" type="hidden" name="user_id" value="{{ Auth::id() }}">
      <!-- <input class="form-control" class="form-control @error('bankname') is-invalid @enderror"  type="text" name="bankname" placeholder="Bank Name" required>
         @error('bankname')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
         </div> -->
      <select name="bankname" class="form-control" required>
         <option selected="selected" value="0">--Select Bank --</option>
         <option value="ALLAHABAD BANK">ALLAHABAD BANK </option>
         <option value="ANDHRA BANK">ANDHRA BANK</option>
         <option value="AXIS BANK">AXIS BANK</option>
         <option value="STATE BANK OF INDIA">STATE BANK OF INDIA</option>
         <option value="BANK OF BARODA">BANK OF BARODA</option>
         <option value="UCO BANK">UCO BANK</option>
         <option value="UNION BANK OF INDIA">UNION BANK OF INDIA</option>
         <option value="BANK OF INDIA">BANK OF INDIA</option>
         <option value="BANDHAN BANK LIMITED">BANDHAN BANK LIMITED</option>
         <option value="CANARA BANK">CANARA BANK</option>
         <option value="GRAMIN VIKASH BANK">GRAMIN VIKASH BANK</option>
         <option value="CORPORATION BANK">CORPORATION BANK</option>
         <option value="INDIAN BANK">INDIAN BANK</option>
         <option value="INDIAN OVERSEAS BANK">INDIAN OVERSEAS BANK</option>
         <option value="ORIENTAL BANK OF COMMERCE">ORIENTAL BANK OF COMMERCE</option>
         <option value="PUNJAB AND SIND BANK">PUNJAB AND SIND BANK</option>
         <option value="PUNJAB NATIONAL BANK">PUNJAB NATIONAL BANK</option>
         <option value="RESERVE BANK OF INDIA">RESERVE BANK OF INDIA</option>
         <option value="SOUTH INDIAN BANK">SOUTH INDIAN BANK</option>
         <option value="UNITED BANK OF INDIA">UNITED BANK OF INDIA</option>
         <option value="CENTRAL BANK OF INDIA">CENTRAL BANK OF INDIA</option>
         <option value="VIJAYA BANK">VIJAYA BANK</option>
         <option value="DENA BANK">DENA BANK</option>
         <option value="BHARATIYA MAHILA BANK LIMITED">BHARATIYA MAHILA BANK LIMITED</option>
         <option value="FEDERAL BANK LTD ">FEDERAL BANK LTD </option>
         <option value="HDFC BANK LTD">HDFC BANK LTD</option>
         <option value="ICICI BANK LTD">ICICI BANK LTD</option>
         <option value="IDBI BANK LTD">IDBI BANK LTD</option>
         <option value="PAYTM BANK">PAYTM BANK</option>
         <option value="FINO PAYMENT BANK">FINO PAYMENT BANK</option>
         <option value="INDUSIND BANK LTD">INDUSIND BANK LTD</option>
         <option value="KARNATAKA BANK LTD">KARNATAKA BANK LTD</option>
         <option value="KOTAK MAHINDRA BANK">KOTAK MAHINDRA BANK</option>
         <option value="YES BANK LTD">YES BANK LTD</option>
         <option value="SYNDICATE BANK">SYNDICATE BANK</option>
         <option value="BANK OF INDIA">BANK OF INDIA</option>
         <option value="BANK OF MAHARASHTRA">BANK OF MAHARASHTRA</option>
      </select>
   </div>

   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="accounttype" value="{{old('accounttype')}}" class="form-control @error('accounttype') is-invalid @enderror" placeholder="Account Type" required>
      @error('accounttype')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="firstname" value="{{old('firstname')}}" class="form-control @error('firstname') is-invalid @enderror" placeholder="First Name" required>
      @error('firstname')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="lastname" value="{{old('lastname')}}" class="form-control @error('lastname') is-invalid @enderror" placeholder="Last Name" required>
      @error('lastname')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="branchcode" value="{{old('branchcode')}}" class="form-control @error('branchcode') is-invalid @enderror" placeholder="Branch Code" required>
      @error('branchcode')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="account_no" value="{{old('account_no')}}" class="form-control @error('account_no') is-invalid @enderror" placeholder="Account Number" required>
      @error('account_no')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <hr>
   
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="streetaddress" value="{{old('streetaddress')}}" class="form-control @error('streetaddress') is-invalid @enderror" placeholder="Street Address ll" required>
      @error('streetaddress')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="city" value="{{old('city')}}" class="form-control @error('city') is-invalid @enderror"placeholder="City" required>
      @error('city')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="zipcode" value="{{old('zipcode')}}" class="form-control @error('zipcode') is-invalid @enderror" placeholder="Postal / ZIP Code" required>
      @error('zipcode')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="country" value="{{old('country')}}" class="form-control @error('country') is-invalid @enderror" placeholder="Country" required>
      @error('country')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="panno" value="{{old('panno')}}" class="form-control @error('panno') is-invalid @enderror" placeholder="Pan No." required>
      @error('panno')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="aadharno" value="{{old('aadharno')}}" class="form-control @error('aadharno') is-invalid @enderror" placeholder="Aadhar No." required>
      @error('aadharno')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <hr>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="contact" value="{{old('contact')}}" class="form-control @error('contact') is-invalid @enderror" placeholder="Contact" required>
      @error('contact')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
   </div>
   <div class="mt-2 col-6">
      <input class="form-control" type="text" name="emailaddress" value="{{old('emailaddress')}}" class="form-control @error('emailaddress') is-invalid @enderror" placeholder="Email Address" required>
      @error('emailaddress')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div
      <hr>
      <div class="form-check mt-4">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label for="invalidCheck" class="form-check-label">I confirm that all data are correct</label>
      </div>
      <div class="form-button mt-3">
         <button id="submit" type="submit" onclick="return confirm('Are you sure you want to submit this form Please Sure?')" class="btn btn-primary">Register</button>
      </div>
</form>
</div>
@endif
@endsection
