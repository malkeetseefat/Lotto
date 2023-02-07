     <!--  footer -->
     <footer>
         <div class="footer">
            <p>© 2023 All Rights Reserved.
               <a href="terms-conditions">Terms & conditions</a>
               &nbsp; <a href="privacy-policy">Privacy Policy</a>
               &nbsp; <a download="" href="download-pdf">Download PDF</a>
            </p>         
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
      <script src="{{ asset('frontend/js/popper.min.js')}}"></script>
      <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('frontend/js/jquery-3.0.0.min.js')}}"></script>
      <!-- sidebar -->
      <script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{ asset('frontend/js/custom.js')}}"></script>


      <script>
         $(document).ready(function() {
         

         setTimeout(function(){
           
            $('.modal').show();
           },5000);
         // in this function you can show your div remove alert and write your code
         });

         $('#popup-close').click(function(e) // You are clicking the close button
         {
         $('#popup').fadeOut(); // Now the pop up is hiden.
         });
         $('#popup').click(function(e) 
         {
         $('#popup').fadeOut(); 
         });
      </script>

      <script>
         $(document).ready(
            function(){
               $(".see_more").click(function () {
                  $(".project_box").show("slow");
                  $(".see_more").hide("slow");
               });
            });
      </script>

      <script type="text/javascript">
         
         var url = "{{ route('changeLang') }}";
         
         $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
         });
         
      </script>

   </body>
</html>