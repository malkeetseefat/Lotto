@extends('admin.master')
@section('content')
<style>
  footer.main-footer {
    display: none;
}
</style>

<div class="container" style="width: 90%;">
    
      <form action="{{ url('search-order') }}" method="GET" role="search" style="margin-bottom: 20px;">
          <div class="input-group">
              
              <input type="text" class="form-control mr-2" name="term" placeholder="Enter Order ID" id="term" style="margin-top: 5px;">
              <a href="{{ url('search') }}" class=" mt-1">
                  <span class="input-group-btn">
                      <button class="btn btn-danger" type="button" title="Refresh page">
                          <span class="fas fa-sync-alt"></span>
                      </button>
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

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr.no.</th>
      <th scope="col">Order no.</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">Country</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  @if(count($orderfilter)>0)
  @php
  $i = 1;
  @endphp
  @foreach($orderfilter as $data)
  <tbody>
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$data->order_no}}</td>
      <td>{{$data->first_name}} {{$data->last_name}}</td>
      <td>{{$data->street_address}}<br>{{$data->city}},  {{$data->pin_code}}</td>
      <td>{{$data->contact}}</td>
      <td>{{$data->country}}</td>
      <td>${{$data->amount}}</td>
      <td>
      <form method="POST" action="{{url('delete-order/'.$data->id)}}">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button type="submit" onclick="return confirm('Are you sure you want to Delete')" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
      </form>
      </td>
    </tr>
  </tbody>

  @endforeach
</table>
<div class="d-flex justify-content-center">
    {{ $orderfilter->links('pagination::bootstrap-4') }}
</div>
</div>

@else
NO RECORD FOUND!
@endif


@endsection