@extends('admin.master')
@section('content')



@foreach($checkProduct as $data)  
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
                     <h5 class="mb-0" style="background-color: #343a40; color: #FFFFFF;">Winning Details</h5>
                  </div>
                  <div class="card-body">
                        <div class="col-sm-6">
                          <div class="card-header">
                            <ul>
                                <li><strong>Ticket No : </strong>{{$data->ticket_no}}</li>
                                <li><strong>Product Name : </strong>{{$data->name}}</li>
                                <li><strong>Name : </strong>{{$data->name}}</li>
                                @if(!empty($submission_type))
                                <li><strong>Amount : </strong>Rs. {{$amount}}</li>
                                @else
                                <li><strong>Points : </strong> {{$data->price}}</li>
                                @endif
                            </ul>
                          </div>
                          @foreach($bankdetails as $bankdata)
                           <div class="card-header">
                           <h5 class="mb-2">Transaction Details</h5>
                                <ul>
                                    <li><strong>Address : </strong>{{$bankdata->streetaddress}}, {{$bankdata->city}},  {{$bankdata->zipcode}}</li>
                                    <li><strong>Country : </strong>{{$bankdata->country}}</li>
                                    <li><strong>Account No : </strong>{{$bankdata->account_no}}</li>
                                    <li><strong>Pan Card No. : </strong><?php echo ''.substr_replace($bankdata->panno, str_repeat("X", 8), 4, 8);  ?></li>
                                    <li><strong>Aadhar No. : </strong>  <?php echo ''.substr_replace($bankdata->aadharno, str_repeat("X", 8), 4, 8);?></li>
                                    <li><strong>Contact : </strong>{{$bankdata->contact}}</li>
                                    <li><strong>Email : </strong>{{$bankdata->emailaddress}}</li>
                                </ul>
                           </div>
                           @endforeach
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
@endsection
