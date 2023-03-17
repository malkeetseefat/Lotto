@extends('admin.master')
@section('content')
<style>
  footer.main-footer {
    display: none;
}
</style>

<p style=" font-size: 18px; font-weight: 600; padding: 0 0 0 9px; ">Total Amount: {{$total}} </p>
<p style=" font-size: 18px; font-weight: 600; padding: 0 0 0 9px; ">Total Points: {{ $total  * $points }} </p>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr.no.</th>
      <th scope="col">Transaction Id</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Date Time</th>
    </tr>
  </thead>
  @if(count($transactions)>0)

  @php
  $i = 1;
  @endphp
  @foreach($transactions as $data)
  <tbody>
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$data->payment_id}}</td>
      <td>{{$data->amount}}</td>
      <td><?php  if($data->status == 'authorized'){  echo "Add Points"; } else{ echo $data->status; }?></td>
      <td>{{$data->created_at}}</td>
      <td>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>


<div class="d-flex justify-content-center">
    {{ $transactions->links('pagination::bootstrap-4') }}
</div>
</div>
@else
NO RECORD FOUND!
@endif

@endsection