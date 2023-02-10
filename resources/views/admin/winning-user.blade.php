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
      <th scope="col">TIcket No.</th>
      <th scope="col"></th>
    </tr>
  </thead>
  @php
  $i = 1;
  @endphp
  @foreach($count as $data)
  @foreach($product as $product)
  @foreach($bankdetail as $bankdetail)
  <tbody>
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$data->first_name}} {{$data->last_name}}</td>
      <td>{{$data->order_no}}</td>
      <td>{{$data->street_address}}, {{$data->city}}<br>{{$data->region}}, {{$data->pin_code}}  <br> {{$data->country}}</td>
      <td>{{$data->contact}}</td>
      <td>{{$product->ticket_no}}</td>
      <td><a class="btn btn-dark" type="button" class="btn btn-primary" onclick="showbankModal()">View</a></td>
    </tr>
  </tbody>
  <div class="modal fade" id="bankdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h6 style=" font-size: 16px; font-weight: 600; ">User Bank Details</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                          </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
  </div>
  @endforeach
  @endforeach
  @endforeach
</table>
</div>
@endsection