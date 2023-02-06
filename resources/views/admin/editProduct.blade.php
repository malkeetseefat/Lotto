@extends('admin.master')
@section('content')
<div class="container" style="width: 90%;">
<form method="post" action="{{url('edit-product')}}" enctype="multipart/form-data">
    @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Seller Name</label>
    <input type="text" class="form-control" name="name" value="{{$usersData->seller}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" name="name" value="{{$usersData->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Product Price</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="price" value="{{$usersData->price}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Product Category</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="category" value="{{$usersData->category}}">
  </div>

  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">Start Date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" value="<?php echo date('Y-m-d',strtotime($usersData->start_date))?>" name="start_date" required>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">End Date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" value="<?php echo date('Y-m-d',strtotime($usersData->end_date))?>" name="end_date" required>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Product Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$usersData->description}}" name="description" >
    <input type="hidden" class="form-control" id="exampleInputPassword1" value="{{$usersData->id}}" name="userid" >
  </div>

 
  <!-- <div class="form-group">
    <label for="exampleInputPassword1">Product Description</label>
    <textarea class="form-control" rows="4" cols="50" maxlength="200"id="exampleInputPassword1" name="description" >{{$usersData->description}}
    </textarea>
  </div> -->

  <img src="{{ url('upload/'.$usersData->photo) }}" width="200" height="100">
  <div class="form-group" style="margin-top: 15px;">
    <input type="file"  id="exampleInputPassword1" name="photo">
  </div>
  <button type="submit" class="btn btn-primary" style="margin-bottom: 35px;">Submit</button>
</form>
</div>
@endsection
