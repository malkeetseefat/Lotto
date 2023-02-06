@extends('frontend.master')
@section('content')


<section class="container-fluid cont-area">
   <div class="container">
   <div class="highlight-div">
      <h4 class="wow bounceInRight" data-wow-delay=".45s"></h4>
   </div>
   <div class="row justify-content-center functn">
      <div class="col-md-12">
         
         <!-- -------------
            online Address
            --------------  -->
         <div class="row justify-content-center">
            <div class="col-md-10 offset-md-1">
               <span class="anchor" id="formComplex"></span>
               <hr class="my-5">
               <!-- form complex example -->
               <div class="card card-outline-secondary">
                  <div class="card-header"  style="background-color: #183661;">
                     <h3 class="mb-0" style="background-color: #183661; color: #FFFFFF;">Order Detail</h3>
                  </div>
                   
                  <div class="card-body">
                     <div class="row mt-4">
                        <div class="col-sm-6">
                          <div class="card-header">
                            <ul>
                              <li><strong>Order No. : </strong>{{$data->order_no}}</li>
                              <li><strong>Order Date : </strong>{{$data->created_at}}</li>
                              <li><strong>Email Address : </strong>{{Auth::User()->email}}</li>
                              <li><strong>Name : </strong>{{$data->first_name}} {{$data->last_name}}</li>
                            </ul>
                          </div>

                           <div class="card-header">
                              <h4>Complete Address</h4>
                                <ul>
                                    <li>Country : {{$data->country}}</li>
                                    <li>Street Address : {{$data->street_address}}</li>
                                    <li>City :  {{$data->city}}</li>
                                    <li>Region : {{$data->region}}</li>
                                    <li>Pin Code : {{$data->pin_code}}</li>
                                    <li>Points : {{$data->amount}}</li>
                                </ul>
                           </div>
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

@endsection
