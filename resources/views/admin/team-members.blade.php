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
      <th scope="col">Email Address</th>
      <th scope="col">Suponser Id</th>
    </tr>
  </thead>
  @if(count($checkparentid)>0)

  @php
  $i = 1;
  @endphp
  @foreach($checkparentid as $data)
  <tbody>
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$data->name}}</td>
      <td><?php if(empty($data->email)) echo '-'; else{ echo $data->email; }?></td>
      <td><?php if(empty($data->suponser_id)) echo '-'; else{ echo $data->suponser_id; }?></td>
    </tr>
  </tbody>
  @endforeach
</table>
<div class="d-flex justify-content-center">
    {{ $checkparentid->links('pagination::bootstrap-4') }}
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