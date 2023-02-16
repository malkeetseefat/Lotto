@extends('admin.master')
@section('content')
<style>
  footer.main-footer {
    display: none;
}
</style>
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
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul>
            <li id="bank_name"><strong>Bank Name : </strong></li>
            <li><strong>Account No. : </strong></li>
            <li><strong>Acc. Holder Name : </strong></li>
            <li><strong>Branch Code : </strong></li>
            <li><strong>Account Type : </strong></li>
            <hr>
            <li><strong>Address : </strong></li>
            <li><strong>Pan no. : </strong></li>
            <li><strong>Aadhar no. : </strong></li>
            <li><strong>Contact : </strong></li>
            <li><strong>Email Address : </strong></li>
          </ul>                   
      </div>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
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
              $('#bank_name').text(data.id);
            }
          },
          error: function(response){

            alert('User Bank Details Not Added !');
          
          }
      });
});
</script>
@endsection
