@extends('frontend.master')
@section('content')
      
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">

                <h1 class="text-center mb-4">Check here how you can place any Order and earn money.</h1>

                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center"> - Create your free account today from click this link <a href="/register"> Free Sign up </a>. </h3>
                        <h3 class="text-center"> - Click Place Order button for create order on any product and try your luck you can win upto 2 Lakh indian rupees price in one montth. </h3>
                        <h3 class="text-center"> - You can share your refferral link with anyone and win free points after that you can use to place Order these points. </h3>
                        <h3 class="text-center"> - Simple way to earn money - Free signup - share refferal link - win free points - place Order - win reward . </h3>
                        <h3 class="text-center"> - After order your own dashboard is ready where you can see your team. </h3>
                        <h3 class="text-center"> - You can add your bank details from dashboard. </h3>
                        <h3 class="text-center"> - You can send tickets for any type of correction. </h3>
                        <h3 class="text-center"> - If you win then you can receive a notificaton on your dashboard where you can. </h3>
                        <h3 class="text-center"> - After you win you need to send request to us for giving you withdrawl . </h3>
                        <h3 class="text-center"> - 4 points value in rupee is ONE Rupee means 20 points = 5-INR . </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- three_box section -->
<div class="three_box">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="gift_box">
               <i><img src="{{ asset('frontend/images/icon_mony.png')}}"></i>
               <span>Make Money From Money</span>
            </div>
         </div>
         <div class="col-md-4">
            <div class="gift_box">
               <i><img src="{{ asset('frontend/images/icon_gift.png')}}"></i>
               <span>Special Gift</span>
            </div>
         </div>
         <div class="col-md-4">
            <div class="gift_box">
               <i><img src="{{ asset('frontend/images/icon_car.png')}}"></i>
               <span>Small Investment - Big Rewards</span>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end three_box section -->

@endsection