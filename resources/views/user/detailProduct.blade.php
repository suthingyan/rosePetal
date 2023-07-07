<!DOCTYPE html>
<html lang="en">
  <head>
    @include('user.css')
  </head>
  <body>
    <div class="container-scroller">
      
        <!-- partial:partials/_navbar.html -->
       
       {{-- @include('user.nav') --}}
        
        <section class="content">
          <div class="container-fluid">
            
            <div class="row mt-4">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-md-12 px-5">
                <a href="{{ route('user#home') }}" style="text-decoration:none;"><div class="mb-3 link-dark fw-bold"><i class="fas fa-arrow-left"></i>Back</div></a>
                  <div class="card">
                    <div class="card-header p-2">
                      <legend class="text-center">Product Information</legend>
                    </div>
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="mt-3 mb-3 text-center">
                                <img src="{{ asset('product/images')}}/{{ $detail->image }}" style="aspect-ratio:1/1;height:400px;" class="img-thumbnail" alt="">
                            </div>
                            <div class="mt-3 mb-3">
                                <div class="">
                                    <b class="">Sub Category :</b>
                                    <span class="">{{ $detail->subCategory }}</span>
                                </div>
                                <div class=" mt-3">
                                    <b class="">Product Code :</b>
                                    <span class="">{{ $detail->productCode }}</span>
                                </div>
                                <div class=" mt-3">
                                    <b class="">Product Title :</b>
                                    <span class="">{{ $detail->title }}</span>
                                </div>
                                <div class=" mt-3">
                                    <b class="">Price :</b>
                                    <span class="">{{ $detail->price }}kyats</span>
                                </div>
                                <div class=" mt-3">
                                    <b class="">Description :</b>
                                    <span class="">{{ $detail->description }}</span>
                                </div>
                                <div class=" mt-3">
                                  @if($detail->quantity==0)
                                  <span class="fw-bolder text-dark mb-2" style="font-size:15px">Out of Stock</span>
                                  @else
                                  <span class="fw-bolder text-dark mb-2" style="font-size:15px">Instock: {{$detail->quantity}}</span>
                                  @endif
                                </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    {{-- <footer>
        @include('user.contactUs')
        <div class="container">
         <div class="row">
         
         </div>
          <div class="row">
            
            <div class="col-md-12">
              <div class="inner-content">
                <p>Copyright &copy; 2023 rosePetals.com</p>
              </div>
            </div>
          </div>
        </div>
      </footer> --}}
  
  
      @include('user.script')
  
  
    </body>
  
  </html>
  