<?php
  $data = Auth::id();
  $checkauth = DB::table('users')->where('id', $data)->first();
  $admin = $checkauth->role;
  $firebase = DB::select('SELECT * FROM firebase_settings');
?>

<?php
 $checknotify = DB::table('notifications')->where('status' , '0')->where('client_id', Auth::id())->count();
 
 $checksubject = DB::table('notifications')->select('*')->where('client_id', Auth::id())->get();

?>

<?php

$twillo = '';
$firebase = '';

$checkverify = DB::select('SELECT * FROM verification_processes');
if($checkverify >= 0 )
{
  foreach($checkverify as $values){
    $twillo = $values->twillo;
    $firebase = $values->firebase;
    if($twillo == '1'){
      $twillo = 'checked';
    }else{
      $twillo = '';
    }
    if($firebase == '1'){
      $firebase = 'checked';
    }else{
      $firebase = '';
    }
  }
}

?>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item dropdown">
        <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a> -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
        
          <div class="row custom" style="margin-left: 13px;">
            <label class="required" for="name">Your name:</label><br />
            <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
            <span id="name_validation" class="error_message"></span>
          </div>

          <div class="row custom" style="margin-left: 13px;">
            <label class="required" for="email">Your email:</label><br />
            <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
            <span id="email_validation" class="error_message"></span>
          </div>

          <div class="row custom" style="margin-left: 13px;">
            <label class="required" for="message">Your message:</label><br />
            <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
            <span id="message_validation" class="error_message"></span>
          </div>
          
        <!-- <div class="row custom" style="margin-left: 13px;">
        <input id="submit_button" type="submit" value="Send email" />
        </div> -->
        </form>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Send Messages </a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php if(!empty( $checknotify )){ echo  $checknotify; }?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php if(!empty( $checknotify )){ echo  $checknotify; }else{ echo 'Hooray, no new message here!'; }?></span>
          <div class="dropdown-divider"></div>

          @foreach($checksubject as $data)
          <a href="#" class="dropdown-item notification_modal" dataid="{{$data->id}}">
             <i class='fas fa-envelope mr-2'> {{substr($data->subject, 0, 10)}}.....read more </i>
          </a>
          @endforeach
          
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a> -->
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <ul class="nav navbar-nav navbar-right" style="margin-top: 8px;"> 
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #000;">Menu <b class="caret"></b></a>
              <ul class="dropdown-menu" style="display: none; left: inherit; padding: 12px; right: 5px;">
                <li style="border: 1px solid #00000024; border-radius: 5px; padding: 3px;">{{ Auth::user()->name }} </li>
                <li style="border: 1px solid #00000024; border-radius: 5px; padding: 3px;"><a style="color: #000;" href="{{ url('change-password') }}">Change Password</a></li>
                <li style="border: 1px solid #00000024; border-radius: 5px; padding: 3px;">
                <a class="" role="button" style="color: #000;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
                </li>
                <li style="border: 1px solid #00000024; border-radius: 5px; padding: 3px;">
                  <a class="" role="button" style="color: #000;" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#">
                    Setting
                  </a>
               </li>
              </ul>
            </li>
          </ul>
    </ul>
  </nav>


  <div class="modal fade" id="firebase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                <h5>Firebase credentials</h5>
                  <button type="button" class="close" data-dismiss="modal" title="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <div class="modal-body">
                <form action="{{ url('firebase-settings') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control" name="apiKey" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter API Key" required>
                    <input type="hidden" class="form-control" name="user_id"  value="{{ Auth::id() }}">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="authDomain" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Auth Domain" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="projectId" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Project Id" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="storageBucket" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Storage Bucket" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="messagingSenderId" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Messaging SenderId" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="appId" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter AppId" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="measurementId" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter MeasurementId" required>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
               </div>
            </div>
         </div>
  </div>

  <div class="modal fade" id="twillo-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                <h5>Twillo credentials</h5>
                  <button type="button" class="close" data-dismiss="modal" title="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <div class="modal-body">
                <form action="{{ url('firebase-settings') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control" name="twillo_sid" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Twiloo S-id" required>
                    <input type="hidden" class="form-control" name="user_id"  value="{{ Auth::id() }}">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="twillo_token" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Token" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="twillo_messagingServiceSid" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Messaging Service Sid" required>
                  </div>
                  
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
               </div>
            </div>
         </div>
  </div>

  <div class="modal fade" id="verificationprocess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                <h5>Verification Setup</h5>
                  <button type="button" class="close" data-dismiss="modal" title="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <div class="modal-body">
                <form action="#" method="post">
                  @csrf
                  <div class="custom-control custom-switch" style="margin-left: 17px;">
                  Twillo<input data-id="1" class="toggle-class2 twillo" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $twillo }}> 
                  </div>

                  <div class="custom-control custom-switch">
                  </div>

                  <div class="custom-control custom-switch">
                  Firebase<input data-id="2" class="toggle-class2 firebase" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $firebase }}>
                  </div>
                  
                  <div class="custom-control custom-switch">
                  </div>

                  <!-- <div class="form-group">
                    <button type="submit" class="btn btn-outline-success" style="">Submit</button>
                  </div> -->
                </form>
               </div>
            </div>
         </div>
  </div>


  
  
  <div class="modal fade" id="notification_modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Notification !</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         
          <div class="modal-body">
          <p id="subject"></p>
          </div>
           
        </div>
      </div>
  </div>
