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
      <td><a class="btn btn-dark" type="button" class="btn btn-primary" onclick="showbankModal2()">View </a></td>
    </tr>
  </tbody>
  @endforeach
</table>
</div>
@foreach($bankdetail as $bankdetail)
<div class="modal fade" id="bankdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h6 style=" font-size: 16px; font-weight: 600; ">User Winning Details</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="card-body">
                     <div class="">
                        <div class="">
                          <div class="card-header">
                            <ul>
                              <li><strong>Bank Name : </strong>{{$bankdetail->bankname}}</li>
                              <li><strong>Account No. : </strong>{{$bankdetail->account_no}}</li>
                              <li><strong>Acc. Holder Name : </strong>{{$bankdetail->firstname}} {{$bankdetail->lastname}} </li>
                              <li><strong>Branch Code : </strong>{{$bankdetail->branchcode}}</li>
                              <li><strong>Account Type : </strong>{{$bankdetail->accounttype}}</li>
                              <hr>
                              <li><strong>Address : </strong>{{$bankdetail->streetaddress}}, {{$bankdetail->city}}, {{$bankdetail->country}}, {{$bankdetail->zipcode}}</li>
                              <li><strong>Pan no. : </strong>{{$bankdetail->panno}}</li>
                              <li><strong>Aadhar no. : </strong>{{$bankdetail->aadharno}}</li>
                              <li><strong>Contact : </strong>{{$bankdetail->contact}}</li>
                              <li><strong>Email Address : </strong>{{$bankdetail->emailaddress}}</li>
                            </ul>
                          </div>

                        <form method="POST" enctype="multipart/form-data" id="image-upload" action="javascript:void(0)" >
                          @csrf
                          <input type="hidden" value='{{$data->id}}' id="id" name="id">
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

                          </div>
                     </div>
                  </div>
               </div>
                
            </div>
         </div>
  </div>
  @endforeach
  @endsection
