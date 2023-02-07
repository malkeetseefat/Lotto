@extends('frontend.master')
@section('content')

<section class="banner_main">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="text-bg text-center" style="">
            
               <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInUp;">
                  Bet on any product and get chance to win reward as money.</h2>
               <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInUp;"> 
                  Share your referral link and get free points. 
               </h2>
               <a class="read_more" href="/register">Register for free</a>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
</section>
<!-- end banner -->

<!-- project section -->
<div id="project" class="project mt-5">
   <div class="container">

      <div class="row">
         <div class="product_main text-center">

            <h2> Share with anyone - win free points. </h2>
            <p>
               Create your account without any cost and share with your friends,family memebers or anyone and win many points free.After that you can bet from these points with free of cost and win many rewards.
            </p>
         
            <h2> What is a product bet? </h2>
            <p> Esmeralda opens by defining what a product bet is: “a bet in product is making a decision—whether it’s about a new feature or product—around an uncertain future” A product bet involves a number of definitive unknowns and dealing with that existence. “The important thing is to maintain a strategy around the calculated risk,” It’s not meant to be blind, or random. But educated, informed, and calculated.
            Why is betting important? Learning requires failure, she says, it’s important to create a safe space for making bets to teams know what success and failure look like.</p>  
            
            <h2> What makes a good vs bad bet? </h2>
            <p>
               Where lies the difference between a good bet and a bad bet? Esmeralda mentions data first. “You need to understand what the data means. It’s about focusing on both qualitative and quantitative data,” she says. This gives you the foundations to make a good bet.

               Although you need the data, you also need to trust your gut and intuition, she says. This comes from experience. It is a misconception that this instinct comes from thin air, but this comes from all of your lessons learned and experiments from talking to customers and making past decisions.

               For the bet to be worth it, it’s important to have a value-based outcome. Where you intend to go with your bet and what you are trying to achieve are crucial as you determining your product roadmap. “Your goal helps inform you what questions to ask as you figure out what bets you want to place.” Measure if you are achieving your outcomes through timeframes and metrics.

               Finally, a good bet requires embracing uncertainty. There are always going to be unknowns, Esmeralda reiterates. “It’s important to find the balance between being informed enough, and making a vague bet,” she says. Don’t let the fact that others haven’t tried it before influence your likelihood of testing a new bet in the market.
            </p>

         </div>
      </div>
      
      <div class="row">
         <div class="col-lg-12 mt-4">
            <h2>Our Products</h2 >
            <div class="table-responsive--md">
               <table class="table custom--table">
                  <thead style="background-color: #37f5f9;">
                     <tr>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Points</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $product)
                     <tr style="background-color: #20204e; color:#ffffff;">
                        <td data-label="Title">
                           <div class="table-game" style="display: flex;">
                              <img src="{{ url('upload/'.$product->photo) }}" alt="image" style="max-width:100px;">
                              &nbsp;
                              <h6 class="name" style="color: white; margin-top: 11px;">{{ $product->name }}</h6>
                           </div>
                        </td>
                        <td data-label="Start Date">{{ $product->start_date }}</td>
                        <td data-label="End Date">{{ $product->end_date }}</td>
                        <td data-label="Price">{{ $product->price }}</td>
                        <td data-label="Action"><a style="color: #ffffff; border: 1px solid;" href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-sm btn-outline--base">Place Bid</a></td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      
      @if(count($status) > 0)
         <div class="row">
         <div class="col-lg-12 mt-5">
            <div class="table-responsive--md">
               <h2>Our Winner's</h2 >
               <table class="table custom--table">
                  <thead style="background-color: #37f5f9;">
                     <tr>
                        <th>Happy Client</th>
                        <th>Product</th>
                        <th>Ticket No.</th>
                     </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($status as $statuswinner)
                     <tr style="background-color: #20204e; color:#ffffff;">
                        <td data-label="Title">
                           <div class="table-game" style="display: flex;">                              
                              <h6 class="name" style="color: white; margin-top: 11px;">{{ $statuswinner['first_name'] }} {{ $statuswinner['last_name'] }}</h6>
                           </div>
                        </td>
                        
                        @foreach($checkproduct as $statuswinner)
                        <td data-label="Title">
                           <div class="table-game111" style="display: flex;">     
                              <img src="{{ url('upload/'.$statuswinner->photo) }}" alt="image" style="max-width: 80px;">                         
                              &nbsp;<h6 class="name" style="color: white; margin-top: 11px;">{{ $statuswinner['name'] }}</h6>
                           </div>
                        </td>

                        <td data-label="Title">
                           <div class="table-game111" style="display: flex;">     
                              <h6 class="name" style="color: white; margin-top: 11px;">{{ $statuswinner['ticket_no'] }}</h6>
                           </div>
                        </td>
                        @endforeach
                     </tr>
                     @endforeach

                   
                  
                  </tbody>
               </table>
            </div>
         </div>
         </div>
      @else
         <div class="row">
         <div class="col-lg-12">
            <div class="table-responsive--md">
               <h2 style="color: #ffffff;">Winner</h2 >
               <table class="table custom--table">
                  
                  <tbody>
                  <div class="progress lottery--progress">
                     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="59" aria-valuemin="0" aria-valuemax="100" style="width: 59%"></div>
                     <span class="" style="font-size: 16px;" >Waiting for winner</span>
                  </div>
                  </tbody>
               </table>
            </div>
         </div>
         </div>
      @endif

   </div>
</div>
<!-- end project section -->

<!-- news section -->
<div class="news">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Happy Users</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="{{ asset('frontend/images/betorwin-happly-clients-Gujrat.jpg')}}"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Bet on betorwin.co.in and try your luck</h3>
                     <span>7 Nov 2022</span> 
                     <div class="date_like">
                        <span>889 Like </span><span class="pad_le">400 Comment</span>
                     </div>
                     <p>I bet on win on share and get Rs.8000/- just only Rs.125/-. Thanks #betorwin</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="{{ asset('frontend/images/betorwin-happly-clients-UP.jpg')}}"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Get big with Small investment</h3>
                     <span>2 Jan 2023</span> 
                     <div class="date_like">
                        <span>1220 Like </span><span class="pad_le">889 Comment</span>
                     </div>
                     <p>I invest just Rs.2000/- and win Rs. 2-Lakh from win on share.Thanks #betorwin fro make me Lakhpatti...</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="{{ asset('frontend/images/betorwin-happly-clients-PB.jpg')}}"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Specimen book. It has survived not only five</h3>
                     <span>7 Jan 2023</span> 
                     <div class="date_like">
                        <span>660 Like </span><span class="pad_le">420 Comment</span>
                     </div>
                     <p>I bet on I phone 13 Pro on Dec 2022 and win this product from #betorwin at New Year.Thanks #betorwin for making my new year special.This is great platform to win big money or gift with small investment.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end news section -->
<!-- newslatter section -->
<div  class="newslatter">
   <div class="container">
      <div class="row d_flex">
         <div class="col-md-5">
            <h3 class="neslatter">Subscribe To The Newsletter</h3>
         </div>
         <div class="col-md-7">
            <form class="news_form">
               <input class="letter_form" placeholder=" Enter your email" type="email" name="Enter your email">
               <button class="sumbit">Subscribe</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- end newslatter section -->
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