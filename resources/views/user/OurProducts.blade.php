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
      <header class="">
        @include('user.nav')
      </header>
   <!-- Page Content -->
    <!-- Banner Starts Here -->
    @include('user.slider')
    <!-- Banner Ends Here -->
     <section id="ourProducts" class="products">
      @if(Session::has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ Session::get('message') }}
        </div>
      @endif
      <div class="container">
        <div class="row">
          <div class="row">
              <div class="mt-0">
                <form class="form-inline" method="get" action="{{ route('user#searchProduct') }}">
                  @csrf
                      <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="" name="search">
                        <input type="submit" class="btn btn-success" value="Search">
                      </div>
                </form>
              </div> 
          </div>
          <div class="row">
            
            <div class="col-12" id="product">   
             <div class="row">
              @foreach($products as $product)
              <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4 mb-3">
                <div class="product-item px-3 py-2 card h-100">
                    <img src="{{ asset('product/images')}}/{{ $product->image }}" style="aspect-ratio:1/1" alt="" class="card-img-top image mb-3">
                    <a href="{{route('user#detailProduct',$product->product_id)}}"><button class="btn btn-md btn-dark text-white btnPrimary float-right mt-3">Detail</button></a>
                    <div class="card-body">
                    <h6 class="fw-bolder text-dark" style="font-size:15px"> MMK {{ $product->price }}</h6>
                    <form action="{{ route('user#order',$product->product_id) }}" method="post">
                      @csrf
                      @if($product->quantity==0)
                      <span class="fw-bolder text-dark mb-2" style="font-size:15px">Out of Stock</span>
                      @else
                      <span class="fw-bolder text-dark mb-2" style="font-size:15px">Instock: {{$product->quantity}}</span>
                      @endif
                      @if(Auth::user())
                        <input type="number" name="quantity" class="form-control mt-2" placeholder="Enter product quantity "  value="" min="1" id="" required>
                      <br>
                      <span>
                        <input type="submit" value="Add To Cart" class="btn btn-dark btnPrimary float-right addToCart">
                      </span>
                      @else
                      <div class=""></div>
                      @endif
                    </form>
                    </div>
                </div>
              </div>
              @endforeach
              @if(method_exists($products,'links'))
              <div class="row m-auto">
                {{ $products->links() }}
              </div>
            @endif 
            </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer>
      @include('user.contactUs')
      <p class="my-3">Copyright &copy; 2023 rosePetals.com</p> 
    </footer>
    @include('user.script')
    <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-arrow-up"></i></a>
    <script>
      
    </script> 
  </body>
</html>

