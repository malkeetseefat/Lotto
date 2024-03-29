

<footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="https://earnwith.shop/cart">earnwith.shop</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>

<script>
$(document).ready(function(){
      $(".alert").delay(5000).slideUp(100);
});
$('ul.nav li.dropdown').hover(function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>
<script>
$( "#target" ).click(function() {
  $('#firebase').modal('show');
});

$( "#twillo" ).click(function() {
  $('#twillo-model').modal('show');
});
$( "#process" ).click(function() {
  $('#verificationprocess').modal('show');
});
function showbankModal2() {
  console.log('Hello');
  $('.winnermodal').modal('show');
}
function showorderdetail() {
  $('#showorderdetail').modal('show');
}
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#image-upload').submit(function(e) {
           e.preventDefault();
           let formData = new FormData(this);
           $.ajax({
              type:'POST',
              url: '/update-winner',
               data: formData,
               contentType: false,
               processData: false,
               success: (response) => {
                 if (response) {
                   this.reset();
                   $('#success').show().fadeOut(2000);
                 }
               },
               error: function(response){
                $('#error').show().fadeOut(2000);
               }
           });
});

$( ".notification_modal" ).click(function() {
  var id = $(this).attr('dataid');
  $.ajax({
        type:'GET',
        url: '/update-notifiystatus',
        data: {"id": id},
        dataType: "json",
          success: (response) => {
            if (response) {
              $('#notification_modals').modal('show');
              $('#subject').html('<strong>'+ response.data['subject'] +'</strong>');
            }
          },
          error: (response) => {
            if (response) {
              
            }
          }
      });
});

</script>
</body>
</html>