<!DOCTYPE html>
<html lang="en">

  <head>

   @include('user.css')

  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

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
    {{-- <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                @if($data->isEmpty())
                <div class="col-md-4">
                  <a href="{{route('login')}}" class="filled-button">Purchase Now</a>
                </div>
                
                @else
                  <div class="col-md-4">
                    <a href="{{route('user#showCart')}}" class="filled-button">Purchase Now</a>
                  </div>
                
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    {{-- <div class="best-features container-fluid bg-light">
      <section id="contactUs">
        <div class="container">
          <div class="row mt-5">
            <div class="text-justify">
              
            </div>
          </div>
        </div>
      </section>
</div> --}}

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
