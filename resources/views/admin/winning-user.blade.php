@extends('admin.master')
@section('content')
<style>
  footer.main-footer {
    display: none;
}
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="color: red;">User Bank Details Not Added !</p>
  
        <form action="javascript:void(0)" method="POST" id="notifications">
          @csrf
            <input type="hidden" name="client_id" class="id" value="">
            <input type="hidden" name="admin_id"  value="{{Auth::id()}}">

            <div class="form-group">
              <label for="exampleFormControlTextarea3">Enter Subject Here</label>
              <textarea class="form-control" name="subject" id="subjectdata" rows="3"></textarea>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Send</button>
            <p id="success_notifiy" style="display:none;">
              <span style="font-size: 17px; line-height: 30.8px; color: green;">
              <strong>Information saved successfully!</strong></span>
            </p>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr.no.</th>
      <th scope="col">Name</th>
      <th scope="col">Order No.</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  @php
  $i = 1;
  @endphp
  @foreach($count as $data)  
  <tbody>
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$data->first_name}} {{$data->last_name}}</td>
      <td>{{$data->order_no}}</td>
      <td>{{$data->street_address}}, {{$data->city}}<br>{{$data->region}}, {{$data->pin_code}}  <br> {{$data->country}}</td>
      <td>{{$data->contact}}</td>
      <td><button class="btn btn-dark viewdetails">View</button>
      <input type="hidden" class="subjectId" value="{{$data->user_id}}">
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      </td>

    </tr>
  </tbody>
  @endforeach
</table>
  <div class="modal winnermodal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Bank Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul>
            <li id="bank_name"></li>
            <li id="account_no"></li>
            <li id="firstname"></li>
            <li id="branchcode"></li>
            <li id="accounttype"></li>
            <hr>
            <li id="address"></li>
            <li id="panno"></li>
            <li id="contact"></li>
            <li id="emailaddress"></li>
          </ul>                   
      </div>
      <div class="form" style=" padding: 26px; ">
        <form method="POST" enctype="multipart/form-data" id="image-upload" action="javascript:void(0)" >
          @csrf
          <input type="hidden" value='' id="id" name="id">
          <div class="form-group">
                <select class="form-control" id="status" name="winning_order_status">
                  <option>Select Status</option>
                  <option value="Approved">Approved</option>
                  <option value="Confirmed">Confirmed</option>
                  <option value="Pending">Pending</option>
                </select>
          </div>
          <div class="form-group">
              <textarea class="form-control" name="subject" rows="2" id="subject" placeholder="Enter Subject Here"></textarea>
          </div>
          <div class="form-group">
            <input type="file" class="form-control-file" id="photo" name="photo">
          </div>

          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          <p id="success" style="display:none;">
          <span style="font-size: 17px; line-height: 30.8px; color: green;">
          <strong>Information saved successfully!</strong></span>
          </p>
          <p id="error" style="display:none;">
          <span style="font-size: 17px; line-height: 30.8px; color: green;">
          <strong>Information saved successfully!</strong></span>
          </p>
        </form>
      <div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(".viewdetails").click(function(){
  var subjectId = $(this).closest("td").find('.subjectId').val();  
  var data = { "_token": $('#token').val() };
  console.log(data);
  $.ajax({
        type:'GET',
        url: '/update-winnerstatus',
        data: {"subjectId": subjectId, "data": data },
        dataType: "json",
          success: (response) => {
            if (response) {
              $('.winnermodal').modal('show');
                $('#bank_name').html('<strong>Bank Name : '+ response.data['bankname'] +'</strong>');
                $('#account_no').html('<strong>Account No. : '+ response.data['account_no'] +'</strong>');
                $('#firstname').html('<strong>Account Holder Name : '+ response.data['firstname'] + response.data['lastname'] +'</strong>');
                $('#branchcode').html('<strong>Branch Code. : '+ response.data['branchcode'] +'</strong>');
                $('#accounttype').html('<strong>Account Type. : '+ response.data['accounttype'] +'</strong>');
                $('#address').html('<strong>Address. : '+ response.data['city'] + ' ' + response.data['streetaddress'] + ' ' + response.data['zipcode'] +' '+ response.data['country'] +'</strong>');
                $('#panno').html('<strong>PAN No. : '+ response.data['panno'] +'</strong>');
                $('#contact').html('<strong>Contact. : '+ response.data['contact'] +'</strong>');
                $('#emailaddress').html('<strong>Email Address. : '+ response.data['emailaddress'] +'</strong>');
            }
          },
          error: (response) => {
            if (response) {
              //console.log(response.responseJSON['dataid']);
              $('#exampleModal_error').modal('show');
              $('.id').val(response.responseJSON['dataid']);
            }
          }
      });
});


$('#notifications').submit(function(e) {
  e.preventDefault();
  let formData = new FormData(this);
  //console.log(formData);
  $.ajax({
        type:'POST',
        url: '/send-notifications',
        data: formData,
        contentType: false,
        processData: false,
          success: (response) => {
            if (response) {
              this.reset();
              $('#success_notifiy').show().fadeOut(2000);
            }
          },
          error: (response) => {
            if (response) {
              
            }
          }
      });
});
</script>
@endsection
