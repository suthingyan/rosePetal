<!DOCTYPE html>
<html lang="en">

  <head>

   @include('user.css')

  </head>

  <body>
    <!-- Header -->
  
    {{-- <header class=""> --}}
        @include('user.nav')
    {{-- </header> --}}
    

   <!-- Page Content -->
    <!-- Banner Starts Here -->
   @include('user.slider')
    <!-- Banner Ends Here -->
    
      @include('user.product')
      @include('user.review')
      @include('user.uploadReview')
    <section class="container-fluid reveal">
      <footer>
        @include('user.contactUs')
        <p class="my-3">Copyright &copy; 2023 rosePetals.com</p>
        
      </footer>
    </section>


    @include('user.script')

    <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-arrow-up"></i></a>
  </body>

</html>
