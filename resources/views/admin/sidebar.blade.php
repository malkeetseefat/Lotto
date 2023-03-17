<?php
        $data = Auth::id();
        $checkauth = DB::table('users')->where('id', $data)->first();
        $admin = $checkauth->role;

        $firebase = DB::select('SELECT * FROM firebase_settings');
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
      <img src="{{ asset('frontend/images/mobile-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('home') }}" class="d-block">{{ Auth::user()->name }}</a> 
          @if(!empty($main))
          <h6 class="d-block" style="color: #c2c7d0;">Rank : {{$main}}</h6>
          @endif
          <!-- @if(empty($main))
          <h6 class="d-block" style="color: #c2c7d0;">Rank : No Rank</h6>
          @endif -->
        </div>
      </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Sidebar Menu -->

    <a title='Home' href="{{ url('home')}}" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fa fa-home" aria-hidden="true"></i>  Home</a>
    <!-- <a href="{{ url('profile') }}" class="d-block mb-3" style="margin-top: 15px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;">  <i class="fas fa-coins" aria-hidden="true"></i>  Share & Earn</a>  -->
    
    @if($admin == '1')

     <a title='Product' href="{{ url('products')}}" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fa fa-list-alt" aria-hidden="true"></i>  Product</a> 
     
     <a title='Firebase Settings' href="{{ url('users-details')}}" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fas fa-users" aria-hidden="true"></i>  User Details</a>
     
     <a title='Firebase Settings' href="{{ url('firebase-collection')}}" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fas fa-landmark" aria-hidden="true"></i>  FireBase Setting</a>
     
     <a title='Verification Process' href="#" id="process" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fas fa-spinner" aria-hidden="true"></i>  Verification </a>
     
     <a title='winning-user' href="{{ url('winning-user')}}" id="process" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fas fa-users" aria-hidden="true"></i>  Winning User </a>

    @endif 

    <a title='Order' href="{{ url('orders')}}" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fa fa-history" aria-hidden="true"></i>  Order</a>
    
    <a title='Team Member' href="{{ url('team')}}" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fas fa-users" aria-hidden="true"></i>  Team Member</a>
    
    <a title='Transaction History' href="{{ url('transactions')}}" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fas fa-history" aria-hidden="true"></i> Transactions</a>

    @if($admin == '0')
        <a title='Bank Detail' href="{{ url('bank-status')}}" class="d-block mb-3" style="margin-top: 5px; padding: 5px 50px; border: 1px solid #4f5962; border-radius: 5px 5px;"><i class="fas fa-landmark" aria-hidden="true"></i>  Bank Detail</a>
    @endif
    <!-- /.sidebar-menu -->
    </div>
</aside>