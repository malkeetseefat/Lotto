@extends('admin.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body>
   <style>
      footer.main-footer {
      display: none;
      }
      /* Button used to open the contact form - fixed at the bottom of the page */
      .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
      }
      /* The popup form - hidden by default */
      .form-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
      }
      /* Add styles to the form container */
      .form-container {
      max-width: 1000px;
      padding: 10px;
      background-color: white;
      }
      /* Full-width input fields */
      .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      }
      /* When the inputs get focus, do something */
      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
      }
      /* Set a style for the submit/login button */
      .form-container .btn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
      }
      /* Add a red background color to the cancel button */
      .form-container .cancel {
      background-color: red;
      }
      /* Add some hover effects to buttons */
      .form-container .btn:hover, .open-button:hover {
      opacity: 1;
      }
   </style>
   <div class="container" style="width: 90%;">
   <!-- <form action="{{ url('search-order') }}" method="GET" role="search" style="margin-bottom: 20px;">
      <div class="input-group">
         <input type="text" class="form-control mr-2" name="term" placeholder="Search Product" id="term" style="margin-top: 5px;">
         <a href="{{ url('search') }}" class=" mt-1">
            <span class="input-group-btn">
                <button class="btn btn-danger" type="button" title="Refresh page">
                    <span class="fas fa-sync-alt"></span>
                </button>
            </span>
            </a>
         <span class="input-group-btn mr-5 mt-1">
         <button class="btn btn-info" type="submit" title="Search Product" style="margin-left: 15px;">
         <span class="fas fa-search"></span>
         </button>
         </span>
      </div>
   </form> -->
   <div>
      @if($check == '0')
      @if($winnerstatus == '1' && $winningplaced == '0')
      <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
         <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 22px; line-height: 30.8px; color: #2a9d8f;"><strong>Congratulations you have win !</strong></span>
         <p class="btn btn-success" onclick="showModal()">Details</p>
         @if ($message = Session::get('success'))
         <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
         </div>
         @endif
         @if ($message = Session::get('error'))
         <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
         </div>
         @endif
         </p>
      </div>
      @elseif($winningplaced == '1')
      <div>
         <a href="{{ url('winning-status') }}" class="btn btn-success mb-2">Winning Status</a>
      </div>
      @endif
      @foreach($winner as $winner)
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                  <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="modal-body">
                  <h6>Name : {{ $winner['first_name']}} {{ $winner['last_name'] }}</h6>
                  <h6>Order No : {{ $winner['order_no']}}</h6>
                  <h6>Product Name : {{ $product_name }}</h6>
                  <h6>Points : {{ $winner['amount']}}</h6>
                  <h6>Ticket No : {{ $lottery_no }}</h6>
               </div>
               <div class="modal-footer">
                  <a type="button" class="btn btn-primary" onclick="showbankModal()">Puchase Money</a>
                  <a type="button" class="btn btn-primary" onclick="showorderModal()">Place Order</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" title="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <div class="modal-body">
                  <form method='post' action="{{ url('winning-product') }}">
                     @csrf
                     <div class="container">
                        <div class="row">
                           <div class="col-12">
                              <h4>Order Details</h4>
                              <hr class="mt-1">
                           </div>
                           <div class="col-12">
                              <div class="row mx-4">
                                 <div class="col-12 mb-2">
                                    <input class="order-form-input" name="first_name" placeholder="First Name" required='' >
                                    <input class="order-form-input" name="user_id" type="hidden" value="{{ Auth::id() }}" >
                                 </div>
                                 <div class="col-12 mb-2">
                                    <input class="order-form-input" name="lastname" placeholder="Last Name" required='' >
                                 </div>
                                 <div class="col-12 mb-2">
                                    <input class="order-form-input" name="email" placeholder="Email Address" required='' >
                                 </div>
                                 <div class="col-12 mb-2">
                                    <input class="order-form-input" name="street_address" placeholder="Street Address" required='' >
                                 </div>
                                 <div class="col-12 mb-2">
                                    <input class="order-form-input" name="city" placeholder="City" required='' >
                                 </div>
                                 <div class="col-12 mb-2">
                                    <input class="order-form-input" name="pin_code" placeholder="Pin Code" required='' >
                                 </div>
                                 <div class="col-12 mb-2">
                                    <input class="order-form-input" name="country" placeholder="Country" required='' > 
                                 </div>
                                 <div class="col-12 mb-2">
                                    <input class="order-form-input" name="contact" placeholder="Contact">
                                    <input type="hidden" class="order-form-input" name="product_id" value="{{ $winner['order_no']}}">
                                    <input type="hidden" class="order-form-input" name="product_name" value="{{ $product_name }}">
                                    <input type="hidden" class="order-form-input" name="product_points" value="{{ $winner['amount']}}">
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
                  </form>
               </div>
               <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
            </div>
         </div>
      </div>
      <div class="modal fade" id="bankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" title="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <div class="modal-body">
                  <p style="font-size: 16px; color: red;">* If Total Points Convert & Earn Money Then {{ $point_deduction }} Pts. Deduction Your Order </p>
                  <p>Total Points: {{ $winner['amount'] - $point_deduction }}</p>
                  <p>Cash Price: Rs.{{ ($winner['amount'] - $point_deduction) * $point_to_cash }}</p>
                  <p>
                     @if(!empty($checkbank))
                     <a type="button" class="btn btn-primary" onclick="showverificationModal()">Earn Cash</a>
                  <form action="{{ url('winning-detail') }}" method='post' style="visibility: hidden;">
                     @csrf
                     <input name="bankname" type="hidden" value='{{ $checkbank->bankname }}'/>
                     <input name="account_no" type="hidden" value='{{ $checkbank->account_no }}'/>
                     <input name="email" type="hidden" value='{{ $checkbank->emailaddress }}'/>
                     <input name="city" type="hidden" value='{{ $checkbank->city }}'/>
                     <input name="submission_type" type="hidden" value='Already Added Bank Details'/>
                     <input name="bankdetail_id" type="hidden" value='{{ $checkbank->user_id }}'/>
                     <input name="user_id" type="hidden" value='{{ $checkbank->user_id }}'/>
                     <input name="cash_amount" type="hidden" value="{{ $winner['amount'] * $point_to_cash }}"/>
                     <input type="hidden" name="product_id" value="{{ $winner['order_no']}}">
                     <input type="hidden" name="product_name" value="{{ $product_name }}">
                     <input type="hidden" name="product_points" value="{{ $winner['amount']}}">
                     <button id="earncash" type="submit" class="btn btn-primary">Earn Cash</button>
                  </form>
                  @else
                  <a href="{{ url('bank-details') }}" class="btn btn-primary">Earn Cash</a>
                  @endif         
                  </p>
               </div>
            </div>
         </div>
      </div>

      <?php
      foreach($firebasesetting as $value){
               $apiKey = $value->apiKey;
               $authDomain = $value->authDomain;
               $projectId = $value->projectId;
               $storageBucket = $value->storageBucket;
               $messagingSenderId = $value->messagingSenderId;
               $appId = $value->appId;
               $measurementId = $value->measurementId;
            }
      ?>

   
      <div class="modal fade" id="verificationmoDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                  <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="modal-body">
                  <div class="container mt-2" style="max-width: 550px">
                     <div class="alert alert-danger" id="error" style="display: none;"></div>
                     <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                     <form class="otpsend">
                        <label>Enter Phone Number:</label>
                        <input type="text" id="number" class="form-control" value="{{$contact}}" placeholder="+91 ********" readonly>
                        <div id="recaptcha-container"></div>
                        <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
                     </form>
                     <div class="mb-5 mt-5 Verificationdiv" style="display: none;">
                        <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                        <form>
                           <input type="text" id="verification" class="form-control" placeholder="Verification code">
                           <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
      @endif
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">Sr. no.</th>
               <th scope="col">Order no.</th>
               <th scope="col">Name</th>
               <th scope="col">Address</th>
               <th scope="col">Contact</th>
               <th scope="col">Country</th>
               <th scope="col">Points</th>
               @if($check == 1)
               <th scope="col">Status</th>
               @endif
               <th scope="col">Action</th>
            </tr>
         </thead>
         @if(count($allOrder)>0)
         @php
         $i = 1;
         @endphp
         @foreach($allOrder as $data)
         <tbody>
            <tr>
               <th scope="row">{{$i++}}</th>
               <td>{{$data->order_no}}</td>
               <td>{{$data->first_name}} {{$data->last_name}}</td>
               <td>{{$data->street_address}} <br> {{$data->city}},  {{$data->pin_code}}</td>
               <td>{{$data->contact}}</td>
               <td>{{$data->country}}</td>
               <td>{{$data->amount}}</td>
               @if($check == 1)
               <td><input data-id="{{$data->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Winner" data-off="InActive" {{ $data->status ? 'checked' : '' }}>
               </td>
               @endif
               <td>
                  <form method="POST" action="{{url('delete-order/'.$data->id)}}">
                     @csrf
                     <input name="_method" type="hidden" value="DELETE">
                     <button type="submit" onclick="return confirm('Are you sure you want to Delete')" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                  </form>
               </td>
            </tr>
         </tbody>
         @endforeach
      </table>
      <div class="d-flex justify-content-center">
         {{ $allOrder->links('pagination::bootstrap-4') }}
      </div>
   </div>
   @else
   NO RECORD FOUND!
   @endif
   <script>

      function showModal() {
        $('#myModal').modal('show');
      }

      function showorderModal() {
        $('#myModal').modal('hide');
        $('#orderModal').modal('show');
      }
      
      function showbankModal() {
        $('#myModal').modal('hide');
        $('#orderModal').modal('hide');
        $('#bankModal').modal('show');
      }
      
      function showverificationModal() {
        $('#myModal').modal('hide');
        $('#orderModal').modal('hide');
        $('#bankModal').modal('hide');
        $('#verificationmoDel').modal('show');
      }
      
      $('.toggle-class').change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0; 
              var user_id = $(this).data('id'); 
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/changeStatus',
                  data: {'status': status, 'user_id': user_id},
                  success: function(data){
                    console.log(data.success)
                  }
              });
          })
   </script>
   <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }
      
      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
   <script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js"></script>
   <script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js"></script>
   <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

   @if($check == '0')
   <script>
      var firebaseConfig = {
          apiKey: "{{ $apiKey }}",
          authDomain: "{{ $authDomain }}",
          projectId: "{{ $projectId }}",
          storageBucket:  "{{ $storageBucket }}",
          messagingSenderId:  "{{ $messagingSenderId }}",
          appId:  "{{ $appId }}",
          measurementId:  "{{ $measurementId }}"
      };
      
      firebase.initializeApp(firebaseConfig);
   </script>
   @endif
   <script type="text/javascript">
      window.onload = function () {
          render();
      };
      function render() {
          window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
          recaptchaVerifier.render();
      }
      function sendOTP() {
          var number = $("#number").val();
          firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
              window.confirmationResult = confirmationResult;
              coderesult = confirmationResult;
              console.log(coderesult);
              $("#successAuth").text("Message sent!");
              $("#successAuth").show().fadeOut(3000);
              $(".Verificationdiv").show();
              $(".otpsend").hide();
          }).catch(function (error) {
              $("#error").text(error.message).fadeOut(3000);
              $("#error").show().fadeOut(3000);
          });
      }
      function verify() {
          var code = $("#verification").val();
          coderesult.confirm(code).then(function (result) {
              var user = result.user;
              console.log(user);
              $("#successOtpAuth").text("Mobile Verification Done!");
              $("#successOtpAuth").show();
              $("#earncash").trigger('click'); 
          }).catch(function (error) {
              $("#error").text(error.message).fadeOut(3000);
              $("#error").show().fadeOut(3000);
          });
      }
   </script>
   @endsection