     <!--  footer -->
     <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>INFORMATION </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>MY ACCOUNT </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>ABOUT  </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>CONTACTS  </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2020-2022 All Rights Reserved.<a href="#"></a></p>
                     </div>
                  </div>
               </div>
            </div>
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
         // if(localStorage.getItem('popState') != 'shown'){
         //    $("#popup").delay(2000).fadeIn();
         //    localStorage.setItem('popState','shown')
         // }

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

      <script>
            $(document).ready(function() {
               $('html, body').animate({ 
			         scrollTop: $(".feature-product").offset().top 
			       }, 2000); 
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