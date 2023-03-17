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

</div>
@else
NO RECORD FOUND!
@endif

@endsection