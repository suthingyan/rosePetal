@if(Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    
  </div>
@endif
<section id="products mt-5 reveal">
<div class="latest-products">
    <div class="container">
      
      <div class="row mb-5">
        <div class="col-lg-2 col-md-12 pb-3">
          <button class="btn btnPrimary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasTop" style="text-decoration:none;color:black;">Categories</button>

            <div class="offcanvas offcanvas-start" style="background: pink" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasTopLabel1">
            <div class="offcanvas-header">
              <h3 id="offcanvasTopLabel1" class="text-center fw-bolder fs-2">Category Lists</h3>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mb-5 px-4">
              <ol start="1">
                @foreach($category as $categories)
                  <li>{{ $categories->categoryTitle }}</li>
                @endforeach
              </ol>
            </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 pb-3">
          <button class="btn btnPrimary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasTop" style="text-decoration:none;color:black;">Subcategories</button>

            <div class="offcanvas offcanvas-start" style="background: pink" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasTopLabel2">
            <div class="offcanvas-header">
              <h3 id="offcanvasTopLabel2" class="text-center fw-bolder fs-2">Sub Category Lists</h3>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mb-5 px-4">
              <ol start="1">
                @foreach($subCategory as $subCategories)
                  <li>{{ $subCategories->subCategory }}</li>
                @endforeach
              </ol>
            </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 pb-3">
          <button class="btn btnPrimary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" style="text-decoration:none;color:black;">Products</button>

            <div class="offcanvas offcanvas-start" style="background: pink" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
              <h3 id="offcanvasTopLabel" class="text-center fw-bolder fs-2">Product Lists</h3>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mb-5 px-4">
              <ol start="1">
                @foreach($data as $product)
                  <li>{{ $product->title }}</li>
                @endforeach
              </ol>
            </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="float-end" id="viewAllProducts">
            <a href="{{ route('user#ourProducts') }}" class="btn btn-lg">view all products<i class="ms-2 fa fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row" id="feature">
        <h2 class="fs-3 fw-bolder mb-3">Feature Products</h2>
        @foreach($data as $product)
        
        @if($product->status==1)
        <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4 mb-3">
          <div class="product-item px-3 py-2 card h-100">
              <img src="{{ asset('product/images')}}/{{ $product->image }}" style="aspect-ratio:1/1" alt="" class="card-img-top image">
              <a href="{{route('user#detailProduct',$product->product_id)}}"><button class="btn btn-md btn-dark mt-3 text-white btnPrimary float-right">Detail</button></a>
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
                  
                  <input type="submit" value="Add To Cart" class="btn btn-dark btnPrimary float-right">
                </span>
                @else
                <div class=""></div>
                @endif
              </form>
              </div>
          </div>
        </div>
        @endif
        @endforeach
        
      </div>
      <div class="row">
        <h2 class="fs-3 fw-bolder mb-3">Popular Products</h2>
        @foreach($data as $product)
        
        @if($product->status==2)
        <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4 mb-3">
          <div class="product-item px-3 py-2 card h-100">
             
            {{-- <div class="imgContainer"> --}}
              <img src="{{ asset('product/images')}}/{{ $product->image }}" style="aspect-ratio:1/1" alt="" class="card-img-top image">
              {{-- <div class="overlayImg">
                <a href="{{route('user#detailProduct',$product->product_id)}}" class="icon"><button class="btn btn-md btn-dark text-white btnPrimary float-left">Detail</button></a>
              </div>
            </div> --}}
            {{-- <div class="down-content"> --}}
              {{-- <p class="fw-bolder text-dark mt-2" style="font-size:15px">Category Name: {{ $product->categoryTitle }}</p> --}}
              <div class="card-body">
                <a href="{{route('user#detailProduct',$product->product_id)}}"><button class="btn btn-md btn-dark text-white btnPrimary float-right mt-0">Detail</button></a>
                {{-- <h4 class="fw-bolder text-dark mb-2" style="font-size:15px">{{ $product->title }}</h4> --}}
              <h6 class="fw-bolder text-dark" style="font-size:15px"> MMK {{ $product->price }}</h6>
              {{-- <p class="fw-bolder text-dark" style="font-size:15px"> {{ $product->description }}</p> --}}
              <form action="{{ route('user#order',$product->product_id) }}" method="post">
                @csrf
                <span class="fw-bolder text-dark mb-2" style="font-size:15px">Instock: {{$product->quantity}}</span>
                @if(Auth::user())
                  {{-- <label for="">Product Quantity</label> --}}
                  <input type="number" name="quantity" class="form-control mt-2" placeholder="Enter product quantity "  value="" min="1" id="" required>
                <br>
                <span>
                 
                  <input type="submit" value="Add To Cart" class="btn btn-dark btnPrimary float-right">
                </span>
                @else
                <div class=""></div>
                @endif
              </form>
              </div>
            {{-- </div> --}}
          </div>
        </div>
        @endif
        @endforeach
      </div>
     
      
      
      {{-- </div> --}}
    </div>
    
  </div>
</section>