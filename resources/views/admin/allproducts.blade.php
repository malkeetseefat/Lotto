@extends('admin.master')
@section('content')
<style>
  footer.main-footer {
    display: none;
}
</style>
<div class="container" style="width: 90%;">
    <a class='btn btn-primary' href="{{url('add-products')}}" style="margin-bottom: 9px;">ADD MORE</a>
      <form action="{{ url('search') }}" method="GET" role="search" style="margin-bottom: 20px;">
          <div class="input-group">
              
              <input type="text" class="form-control mr-2" name="term" placeholder="Search Product" id="term" style="margin-top: 5px;">
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
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @if(count($allProduct)>0)

  @php
  $i = 1;
  @endphp
  @foreach($allProduct as $data)
  <tbody>
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->description}}</td>
      <td> <?php if($data->category != '') { echo $data->category; }else{ echo "-"; } ?> </td>
      <td>{{$data->price}}</td>
      <td>{{$data->start_date}}</td>
      <td>{{$data->end_date}}</td>
      <td><img src = "{{ url('upload/'.$data->photo) }}" width = "200" height = "100"></td>
      <!-- <td><a class = "btn btn-primary" onclick="return confirm('Are you sure?')"  href = "{{url('delete/'.$data->id)}}"> Delete </a></td> -->
      <td><a class = "btn btn-primary" href = "{{url('edit/'.$data->id)}}"> Edit </a></td>
      <td>
      <form method="POST" action="{{url('delete/'.$data->id)}}">
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
    {{ $allProduct->links('pagination::bootstrap-4') }}
</div>
</div>
@else
NO RECORD FOUND!
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>

@endsection