
<header>
         <!-- header inner -->
         <div class="header">
            
            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-4">
                        <ul class="conta_icon d_none1">
                           <li><a href="mailto:contact@betorwin.co.in"><img src="{{ asset('frontend/images/email.png')}}" alt="#"/> contact@betorwin.co.in</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <a class="logo" href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo.png')}}" alt="#"/></a>
                     </div>
                     <div class="col-md-4">
                        <ul class="right_icon d_none1">
                           <li><a href="{{ url('cart') }}"><img src="{{ asset('frontend/images/shopping.png')}}" alt="#"/></a> </li>
                           <a href="{{ url('shopping')}}" class="order">Order Now</a> 
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header_bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 mb4">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                    <a class="nav-link" href="/">Home</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ url('shopping')}}">Products</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{url('how-to-bid')}}">How to Bid</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{url('winners')}}">Winners</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ url('contact')}}">Contact Us</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class="col-md-4 col-sm-4 col-lg-4 mt4">
                        <div class="search">
                           <div class="dropdown myitem">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 My Account
                              </button>
                              @if (auth()->check())
                                 <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="home">Dashboard</a>
                                 </div>
                              @else
                                 <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/login">Login</a>
                                    <a class="dropdown-item" href="/register">Register</a>
                                    <a class="dropdown-item" href="/password/reset">Forgot Password</a>
                                 </div>
                              @endif
                              
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </header>