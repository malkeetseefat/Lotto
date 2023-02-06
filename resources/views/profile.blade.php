@extends('admin.master')
@section('content')
<h5 style="text-align: center;">
<input style="display: none;" type="text" value="{{ url('registers/'.$finalid) }}" id="myInput" readonly="">
<button class="btn btn-primary" onclick="myFunction()">Copy Link</button>
<a class="btn btn-primary" href="https://api.whatsapp.com/send?phone=whatsappphonenumber&text=urlencodedtext">Share on Whatsapp</a>
</h5>
@endsection
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  alert("Copied the text: " + copyText.value);
}
</script>

