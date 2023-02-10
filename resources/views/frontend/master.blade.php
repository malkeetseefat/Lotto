<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Bet or Win</title>
      <link rel="icon" href="{{ asset('frontend/images/mobile-logo.png')}}" type="image/x-icon">
      <meta name="keywords" content="how to bet,bet,bet in india,investment,bigwin,winonshare,buy and win,best bet company in india,best bet compnay,bet anywhere">
      <meta name="description" content="Bet on any product and try your luck you are next billionaire of india.">
      <meta name="author" content="contact@betorwin.co.in">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('frontend/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('frontend/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('frontend/images/loading.gif')}}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
     @include("frontend.header")
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
@yield('content')

 @include('frontend.footer')

