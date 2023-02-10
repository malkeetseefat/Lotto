@extends('admin.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
  footer.main-footer {
    display: none;
}
</style>
<div class="container" style="width: 90%;">
      <form action="{{ url('search') }}" method="GET" role="search" style="margin-bottom: 20px;">
          <div class="input-group">
              
              <input type="text" class="form-control mr-2" name="term" placeholder="Search Product" id="term" style="margin-top: 5px;">
              <a href="{{ url('search') }}" class="mt-1">
                  <span class="input-group-btn">
                      <!-- <button class="btn btn-danger" type="button" title="Refresh page">
                          <span class="fas fa-sync-alt"></span>
                      </button> -->
                  </span>
              </a>
              <span class="input-group-btn mr-5 mt-1">
                  <button class="btn btn-info" type="submit" title="Search Product" style="margin-left: 15px;">
                      <span class="fas fa-search"></span>
                  </button>
              </span>
          </div>
      </form>
<div>
<a title='Firebase Settings' id="target" type="button "class="btn btn-success mb-2">Firebase credentials</a>
<a title='Firebase Settings' id="twillo" type="button "class="btn btn-success mb-2">Twillo credentials</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr.no.</th>
      <th scope="col">ApiKey</th>
      <th scope="col">AuthDomain</th>
      <th scope="col">ProjectId</th>
      <th scope="col">StorageBucket</th>
      <th scope="col">MessagingSenderId</th>
      <th scope="col">AppId</th>
      <th scope="col">MeasurementId</th>
      <th scope="col">Twillo S-id</th>
      <th scope="col">Token</th>
      <th scope="col">Twillo MessagingServiceSid</th>
      <th scope="col">Status</th>
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
      <!-- <td>{{$data->apiKey}}</td> -->
      <td>@if(!empty($data->apiKey)){{$data->apiKey}} @elseif($data->apiKey == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->authDomain)){{$data->authDomain}} @elseif($data->authDomain == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->projectId)){{$data->projectId}} @elseif($data->projectId == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->storageBucket)){{$data->storageBucket}} @elseif($data->storageBucket == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->messagingSenderId)){{$data->messagingSenderId}} @elseif($data->messagingSenderId == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->appId)){{$data->appId}} @elseif($data->appId == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->measurementId)){{$data->measurementId}} @elseif($data->measurementId == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->twillo_sid)){{$data->twillo_sid}} @elseif($data->twillo_sid == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->twillo_token)){{$data->twillo_token}} @elseif($data->twillo_token == ''){{ '-' }} @endif</td>
      <td>@if(!empty($data->twillo_messagingServiceSid)){{$data->twillo_messagingServiceSid}} @elseif($data->twillo_messagingServiceSid == ''){{ '-' }} @endif</td>
      <td><input data-id="{{$data->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $data->status ? 'checked' : '' }}>
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
<br>
NO RECORD FOUND!
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
       $('.toggle-class').change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0; 
              var user_id = $(this).data('id'); 
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/changefirebaseStatus',
                  data: {'status': status, 'user_id': user_id},
                  success: function(data){
                    console.log(data.success)
                  }
              });
          })

          $('.toggle-class2').change(function() {
          // $('.check').not(this).prop('checked', false); 
          var twillo = $('.twillo').prop('checked') == true ? 1 : 0; 
          var firebase = $('.firebase').prop('checked') == true ? 1 : 0; 
          var id = '1';
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/verificationprocess',
              data: {'twillo': twillo, 'id': id, 'firebase': firebase},
              success: function(data){
                console.log(data.success)
              }
          });
          })
</script>
@endsection