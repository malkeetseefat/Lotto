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

<form method="post" action="{{url('add-product')}}" enctype="multipart/form-data">
    @csrf
    <!-- <a class="btn btn-primary" href="{{ url('products')}}">View</a> -->
  <div class="form-group">
    <label for="exampleInputPassword1">Seller Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="seller" value="{{ Auth::user()->name }}" readonly>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div> 
  <div class="form-group">
    <label for="exampleInputPassword1">Product Price</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="price" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Product Category</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="category" required>
  </div>

  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">Start Date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" name="start_date" required>
  </div>

  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">End Date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" name="end_date" required>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Product Description</label>
    <textarea class="form-control" rows="4" cols="50" maxlength="200"id="exampleInputPassword1" name="description" >
    </textarea>
  </div>
  <div class="form-group">
    <input type="file" id="exampleInputPassword1" name="photo" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
