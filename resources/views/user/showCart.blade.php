<!DOCTYPE html>
<html lang="en">

  <head>

   @include('user.css')

  </head>

  <body>
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
                    @foreach($products as $product)
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
                          <div class="quantity">
                          <div class="input-group">
                            <a href="{{ route('user#decQty',$carts->id) }}" class="btn btn1 @if($carts->quantity==1) disabled @endif" ><i class="fa fa-minus"></i></a>
                            <input type="text" value="{{ $carts->quantity }}" class="input-quantity" min="1">
                            <a href="{{ route('user#incQty',$carts->id) }}" class="btn btn1 @if($carts->quantity==$product->quantity) disabled @endif"><i class="fa fa-plus"></i></a>
                          </div>
                        </div>
                          </td>
                        <td>
                            <input type="text" name="price[]" value="{{ $carts->price }}" hidden="">
                            {{ $carts->price }}</td>
                        <td>
                            <input type="text" name="totalPrice[]" value="{{ $carts->totalPrice }}" hidden="">
                            {{ $totalPrice=$carts->quantity*$carts->price }}</td>
                        <td>
                            <a href="{{ route('user#deleteOrder',$carts->id) }}" onclick="return confirm('Are you sure delete?')" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a>
                        </td>
                        @php
                        $allTotal+=$totalPrice;
                        @endphp
                    </tr>
                    @endforeach
                    @endforeach
                    <tr class="fw-bolder ">
                      <td colspan="5" class="text-right">Total Price....</td>
                      <td> {{ $allTotal}}</td>
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
  
