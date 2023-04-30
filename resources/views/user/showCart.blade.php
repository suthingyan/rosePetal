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
    
      <div class="container-fluid">
        <section id="confirmOrder">
          <div class="bg-light" style="padding: 100px 0px 0px 0px">
            <form action="{{ url('confirmOrder') }}" method="POST">
                @csrf
                <div class="container">
                  <table class="table table-responsive-lg table-responsive-md table-responsive-sm table-hover" style="overflow-x:scroll">
                    
                    @if($cart->isEmpty())
                        <tr class="col-span text-center">
                          <td>
                            @if(Session::has('success'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ Session::get('success') }}
                                  {{-- <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button> --}}
                              </div>
                            @endif
                    
                           <span class="fw-bold">Do you want to purchase product? <a href="{{ route('user#ourProducts')}}" class="filled-button">To Order</a></span> 
                          </td>
                        </tr>
                    @else
                    <tr class="bg-dark text-white">
                        <th>Sub Category</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $allTotal=0;
                    @endphp
                    @foreach($cart as $carts)
                    
                    <tr>
                        <td>
                            <input type="text" name="subCategory[]" value="{{ $carts->subCategory }}" hidden="">
                            {{ $carts->subCategory }}
                        </td>
                        <td>
                          <input type="text" name="productCode[]" value="{{ $carts->productCode }}" hidden="">
                          {{ $carts->productCode }}
                      </td>
                        <td>
                            <input type="text" name="title[]" value="{{ $carts->title }}" hidden="">
                            {{ $carts->title }}
                        </td>
                        <td>
                          <form action="{{route('user#updateOrderQty',$carts->id)}}">
                            @csrf
                            <div class="input-group">
                              <span class="input-group-btn">
                                  <button type="submit" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                    <span class="glyphicon glyphicon-minus"></span>
                                  </button>
                              </span>
                              <input type="text" id="quantity" name="quantity" class="form-control input-number quantity" value="{{$carts->quantity}}" min="1">
                              <span class="input-group-btn">
                                  <button type="submit" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                      <span class="glyphicon glyphicon-plus"></span>
                                  </button>
                              </span>
                          </div>
                          </form>
                            {{-- <input type="text" name="quantity[]" value="{{ $carts->quantity }}" hidden="">
                            {{ $carts->quantity }}
                            <a href="{{ route('user#editOrderQty',$carts->id) }}" class="btn"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a> --}}

                        </td>
                        <td>
                            <input type="text" name="price[]" value="{{ $carts->price }}" hidden="">
                            {{ $carts->price }}</td>
                        <td>
                            <input type="text" name="totalPrice[]" value="{{ $carts->totalPrice }}" hidden="">
                            {{ $carts->quantity*$carts->price }}</td>
                        <td>
                            <a href="{{ route('user#deleteOrder',$carts->id) }}" onclick="return confirm('Are you sure delete?')" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a>
                        </td>
                        @php
                        $allTotal+=$carts->totalPrice;
                        @endphp
                    </tr>
                    
                    @endforeach
                    
                    <tr class="fw-bolder ">
                      <td colspan="5" class="text-right">Total Price....</td>
                      <td> {{ $allTotal }}</td>
                    </tr>
                    
                    
                    @endif
                    
                  </table>
                </div>
                @if($cart->isEmpty())
                <div class="text-center">
                  <button class="btn btn-success " disabled>Confirm Order</button>
                </div>
                @else
                <div class="text-center">
                  <button class="btn btn-success">Confirm Order</button>
                </div>
                @endif
                {{-- @foreach($cart as $carts)
                @if($carts=='')
                  <div class="text-center">
                    
                  </div>
                
                @else --}}
                    
                  
                {{-- @endif
                @endforeach --}}
            </form>
          </div>
        </section>
      </div>
   

    
      <footer>
        @include('user.contactUs')
        <p class="my-3">Copyright &copy; 2023 rosePetals.com</p>
      </footer>
  
  
      @include('user.script')
      <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-arrow-up"></i></a>
      
    </body>
  
  </html>
  
