@extends('admin.master')
@section('content')
<div class="container" style="width: 90%;">

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

<form method="post" action="{{url('send-all')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">What is the message</label>
    <textarea class="form-control" name="msg" required></textarea>
  </div> 
  <button type="submit" class="btn btn-primary">Send this all emails</button>
</form>
</div>
@endsection
