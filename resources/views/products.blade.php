@extends('frontend.master')
@section('content')

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<section class="banner_main">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="text-bg" style="">
               <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInUp;">Play lottery and get chance to win reward</h2>
               <a class="read_more" href="#project">Register for free</a>
            </div>
         </div>
         <!-- <div class="col-md-4">
            <div class="ban_img">
              <figure><img src="{{ asset('frontend/images/pngegg.png')}}" alt="#"/></figure> -->
      </div>
   </div>
   </div>
   </div>
</section>
<!-- end banner -->
<!-- six_box section -->
<!-- <div class="six_box">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-2 col-sm-4 pa_left">
            <div class="six_probpx yellow_bg">
               <i><img src="{{ asset('frontend/images/shoes.png')}}" alt="#"/></i>
               <a href="{{ url('product-category/'.$data='shoes') }}"><span>{{ GoogleTranslate::trans('Shoes', app()->getLocale()) }}</span></a>
            </div>
         </div>
         <div class="col-md-2 col-sm-4 pa_left">
            <div class="six_probpx bluedark_bg">
               <i><img src="{{ asset('frontend/images/underwear.png')}}" alt="#"/></i>
               <span>{{ GoogleTranslate::trans('Underwear', app()->getLocale()) }}</span>
            </div>
         </div>
         <div class="col-md-2 col-sm-4 pa_left">
            <div class="six_probpx yellow_bg">
               <i><img src="{{ asset('frontend/images/pent.png')}}" alt="#"/></i>
               <span>{{ GoogleTranslate::trans('Pante & socks', app()->getLocale()) }}</span>
            </div>
         </div>
         <div class="col-md-2 col-sm-4 pa_left">
            <div class="six_probpx bluedark_bg">
               <i><img src="{{ asset('frontend/images/t_shart.png')}}" alt="#"/></i>
               <a href="{{ url('product-category/'.$data='t-shirt') }}"><span>{{ GoogleTranslate::trans('T-shirt & tankstop', app()->getLocale()) }}</span></a>
            </div>
         </div>
         <div class="col-md-2 col-sm-4 pa_left">
            <div class="six_probpx yellow_bg">
               <i><img src="{{ asset('frontend/images/jakit.png')}}" alt="#"/></i>
               <span>Cardigans & jumpers</span>
            </div>
         </div>
         <div class="col-md-2 col-sm-4 pa_left">
            <div class="six_probpx bluedark_bg">
               <i><img src="{{ asset('frontend/images/helbet.png')}}" alt="#"/></i>
               <span>{{ GoogleTranslate::trans('Top & hat', app()->getLocale()) }}</span>
            </div>
         </div>
      </div>
   </div>
</div> -->
<!-- end six_box section -->
<!-- project section -->
<div id="project" class="project">
   <div class="container">


   @if(count($status) > 0)
      <div class="row">
         <div class="col-lg-12">
            <div class="table-responsive--md">
               <h2 style="color: #ffffff;">Winner</h2 >
               <table class="table custom--table">
                  <thead style="background-color: #37f5f9;">
                     <tr>
                        <th>Name</th>
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
                              <img src="{{ url('upload/'.$statuswinner->photo) }}" alt="image" style="max-width: 40px;">                         
                              <h6 class="name" style="color: white; margin-top: 11px;">{{ $statuswinner['name'] }}</h6>
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
      
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2 style="color: #ffffff;" >Lottery Calendar</h2>
               <form method="post" action="{{ url('shoppiing') }}">
                  @csrf
                  <select name="filter" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
                     <option selected>{{ GoogleTranslate::trans('Filter', app()->getLocale()) }} </option>
                     <option value="T-Shirt">{{ GoogleTranslate::trans('T-Shirt', app()->getLocale()) }}</option>
                     <option value="T-Shirt">{{ GoogleTranslate::trans('Shoes', app()->getLocale()) }}</option>
                     <option value="mobile">Smartphone</option>
                  </select>
               </form>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-lg-12">
            <div class="table-responsive--md">
               <table class="table custom--table">
                  <thead style="background-color: #37f5f9;">
                     <tr>
                        <th>Title</th>
                        <th>Ticket No.</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Points</th>
                        <th>Sold</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $product)
                     <tr style="background-color: #20204e; color:#ffffff;">
                        <td data-label="Title">
                           <div class="table-game" style="display: flex;">
                              <img src="{{ url('upload/'.$product->photo) }}" alt="image" style="max-width: 40px;">
                              
                              <h6 class="name" style="color: white; margin-top: 11px;">{{ $product->name }}</h6>
                           </div>
                        </td>
                        <td data-label="Start Date">{{ $product->ticket_no }}</td>
                        <td data-label="Start Date">{{ $product->start_date }}</td>
                        <td data-label="End Date">{{ $product->end_date }}</td>
                        <td data-label="Price">{{ $product->price }}</td>
                        <td data-label="Sold">
                           <div class="progress lottery--progress">
                              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="59" aria-valuemin="0" aria-valuemax="100" style="width: 59%"></div>
                           </div>
                           <span class="fs--14px">50%</span>
                        </td>
                        <td data-label="Status">
                           Waiting For Draw                                                                    
                        </td>
                        <td data-label="Action"><a style="color: #ffffff; border: 1px solid;" href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-sm btn-outline--base">Buy Ticket</a></td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>




      <div class="row">
         <div class="product_main">
            <!-- @php $i = 1; @endphp
               @foreach($products as $product)
               <div class="project_box" id="{{$i++}}" style="<?php if($i > '6') echo "display:none;"?>">
                        <div class="dark_white_bg" ><a href="{{ url('product/'.$product->id)}}"><img  src="{{ url('upload/'.$product->photo) }}" style="height: 100px !important;" alt="#"/></a></div>
                        <h3>{{ $product->name }} <br> Points{{ $product->price }}</h3>
                        <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                     </div>
               @endforeach -->
            <!-- <div class="col-md-12">
               <a class="read_more see_more">See More</a>
               </div> -->
         </div>
      </div>
   </div>
</div>
<!-- end project section -->
<!-- fashion section -->



  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{ asset('frontend/images/fashion.jpg')}}" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="{{ asset('frontend/images/fashion.jpg')}}" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="{{ asset('frontend/images/fashion.jpg')}}" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<!-- <div class="fashion">
   <a href="#project"> <img src="{{ asset('frontend/images/fashion.jpg')}}" alt="#"/><a>
</div> -->
<!-- end fashion section -->
<!-- news section -->
<div class="news">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Letest News</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="{{ asset('frontend/images/news_img1.jpg')}}"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Specimen book. It has survived not only five</h3>
                     <span>7 July 2019</span> 
                     <div class="date_like">
                        <span>Like </span><span class="pad_le">Comment</span>
                     </div>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="{{ asset('frontend/images/news_img2.jpg')}}"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Specimen book. It has survived not only five</h3>
                     <span>7 July 2019</span> 
                     <div class="date_like">
                        <span>Like </span><span class="pad_le">Comment</span>
                     </div>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="{{ asset('frontend/images/news_img3.jpg')}}"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Specimen book. It has survived not only five</h3>
                     <span>7 July 2019</span> 
                     <div class="date_like">
                        <span>Like </span><span class="pad_le">Comment</span>
                     </div>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
               <input class="letter_form" placeholder=" Enter your email" type="text" name="Enter your email">
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
               <span>Money Back</span>
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
               <span>Free Shipping</span>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end three_box section -->
@endsection