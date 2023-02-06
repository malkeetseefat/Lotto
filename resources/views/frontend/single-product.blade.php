@extends('frontend.master')
@section('content')
<link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
<div class="container-fluid mt-2 mb-3" style="padding-left: 166px !important; padding-right: 86px !important;">
    <div class="row no-gutters" style="margin-top: 71px !important; margin-bottom: 71px !important;">
        <div class="col-md-5 pr-2">
            <div class="card">
                <div class="demo">
                    <ul id="lightSlider">
                        <li data-thumb="https://i.imgur.com/KZpuufK.jpg"> <img src="{{ url('upload/'.$user->photo) }}" /> </li>
                        
                    </ul>
                </div>
            </div>
            <!-- <div class="card mt-2">
                <h6>Reviews</h6>
                <div class="d-flex flex-row">
                    <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ml-1 font-weight-bold">4.6</span>
                </div>
                <hr>
                <div class="badges"> <span class="badge bg-dark ">All (230)</span> <span class="badge bg-dark "> <i class="fa fa-image"></i> 23 </span> <span class="badge bg-dark "> <i class="fa fa-comments-o"></i> 23 </span> <span class="badge bg-warning"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="ml-1">2,123</span> </span> </div>
                <hr>
                <div class="comment-section">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/o5uMfKo.jpg" class="rounded-circle profile-image">
                            <div class="d-flex flex-column ml-1 comment-profile">
                                <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="username">Lori Benneth</span>
                            </div>
                        </div>
                        <div class="date"> <span class="text-muted">2 May</span> </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/tmdHXOY.jpg" class="rounded-circle profile-image">
                            <div class="d-flex flex-column ml-1 comment-profile">
                                <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="username">Timona Simaung</span>
                            </div>
                        </div>
                        <div class="date"> <span class="text-muted">12 May</span> </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="d-flex flex-row align-items-center">
                    <div class="p-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ml-1">5.0</span>
                </div>
                <div class="about ml-2" style="padding: 29px 0 10px 0 !important;"><span class="font-weight-bold">{{ $user->name }}</span>
                    <h4 class="font-weight-bold">${{ $user->price }}</h4>
                </div>
                <div class="buttons ml-2"> 
                    <a href="{{ url('add-to-cart/'.$user->id) }}" class="btn btn-outline-warning btn-long cart">Add to Cart</a> 
                    <a href="{{ url('add-to-cart/'.$user->id) }}" class="btn btn-light wishlist"> 
                        <i class="fa fa-heart"></i> </a> 
                </div>
                <hr>
                <div class="product-description">
                    <div class="d-flex flex-row align-items-center"> 
                        <span class="ml-1">Seller: {{$user->seller}} <br> Delivery from sweden, 15-45 days</span> 
                    </div>
                    <div class="mt-4 ml-2"> <span class="font-weight-bold">Description</span>
                        <p>{{$user->description}}</p>
                    </div>
                    
                </div>
                
                <div class="card mt-2"> <span>Similar items:</span>

                
                <div class="similar-products mt-2 d-flex flex-row">
                    @foreach($data as $values)
                    <div class="card border p-1" style="width: 9rem;margin-right: 3px; "> <a href="{{ url('product/'.$values->id)}}"><img style="height: 100px !important;" src="{{ url('upload/'.$values->photo) }}" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                            <h6 class="card-title" style="font-size: 12px;">{{$values->name}}</h6>
                            <h6 class="card-title">${{$values->price}}</h6>
                        </div>
                    </div>
                    @endforeach
                </div>

              
            </div>
            </div>

        </div>
    </div>
</div>

<div id="project" class="project">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Featured Products</h2>
                  </div>
               </div>
            </div>
            <div class="row">
         
            <div class="product_main">
            @php $i = 1; @endphp
            @foreach($allProduct as $product)
                     <div class="project_box" id="{{$i++}}" style="<?php if($i > '11') echo "display:none;"?>">
                        <div class="dark_white_bg" ><a href="{{ url('product/'.$product->id)}}"><img  src="{{ url('upload/'.$product->photo) }}" style="height: 100px !important;" alt="#"/></a></div>
                        <h3>{{ $product->name }}  ${{ $product->price }}</h3>
                        <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                     </div>
               @endforeach
               <div class="col-md-12">
                  <a class="read_more see_more">See More</a>
               </div>
            </div>
            </div>
         </div>
      </div>
  
      <!-- end project section -->
      <!-- fashion section -->
      <div class="fashion">
        <a href="#project"> <img src="{{ asset('frontend/images/fashion.jpg')}}" alt="#"/><a>
      </div>
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

