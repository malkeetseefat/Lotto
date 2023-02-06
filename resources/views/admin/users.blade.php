@extends('admin.master')
@section('content')
<style>
  footer.main-footer {
    display: none;
}
</style>
<div class="container" style="width: 90%;">
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
      <th scope="col">Email Address</th>
      <th scope="col">Suponser Id</th>
      <th scope="col">Parent Id</th>
      <th scope="col">Points</th>
      <th scope="col">Actual Points</th>
      <th scope="col">Password</th>
      <th scope="col">Status</th>
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
      <td><?php if(empty($data->email)) echo '-'; else{ echo $data->email; }?></td>
      <td><?php if(empty($data->suponser_id)) echo '-'; else{ echo $data->suponser_id; }?></td>
      <td><?php if(empty($data->parent_id)) echo '-'; else{ echo $data->parent_id; }?></td>
      <td><?php if(empty($data->wallet_points)) echo '-'; else{ echo $data->wallet_points; }?></td>
      <td><?php if(empty($data->actual_point)) echo '-'; else{ echo $data->actual_point; }?></td>
      <td>
           <span style="background-color: green; color: #ffffff;"> {{ $data->default_password }} </span>
      </td>


      <td><select class="custom-select">
        <option value="{{ $data->role }}" {{$data->role == $data->role  ? 'selected' : ''}} >
          <?php 
          if($data->role == '0') echo "<span style='background-color: red; color: #ffffff;'>User</span>"; 
          elseif($data->role == '1') echo "<span style='background-color: green; color: #ffffff;'>Admin</span>"; 
          ?>
        </option>
      </td> 

      
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