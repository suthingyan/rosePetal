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
          <div class="bg-light w-auto" style="padding-top: 100px">
            {{-- <form action="{{ url('confirmOrder') }}" method="POST">
                @csrf --}}
                <table class="table table-responsive-lg table-responsive-md table-responsive-sm table-hover" style="overflow-x:scroll">
                   
                    {{-- @if($cart->isEmpty())
                        <tr class="col-span text-center">
                          <td>Hello! Do you want to order our products?
                            <a href="{{ route('user#ourProducts')}}" class="filled-button">To Order</a>
                          </td>
                        </tr>
                    @else --}}
                    <tr class="bg-dark text-white">
                        {{-- <th>Category Name</th> --}}
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Total Price</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                    
                    @foreach($data as $datas)
                    
                    <tr>
                        {{-- <td>
                            <input type="text" name="categoryTitle[]" value="{{ $carts->categoryTitle }}" hidden="">
                            {{ $carts->categoryTitle }}
                        </td> --}}
                        <td>
                            <input type="text" name="title[]" value="{{ $datas->title }}" hidden="">
                            {{ $datas->title }}
                        </td>
                        <td>
                            <input type="text" name="quantity[]" value="{{ $datas->quantity }}" hidden="">
                            {{ $datas->quantity }}
                        </td>
                        <td>
                            <input type="text" name="price[]" value="{{ $datas->price }}" hidden="">
                            {{ $datas->price }}</td>
                        <td>
                            <input type="text" name="status[]" value="{{ $datas->status }}" hidden="">
                            {{ $datas->status }}</td>
                            <td>{{ $datas->created_at->format('M d Y') }}</td>
                        <td>
                            <input type="text" name="price[]" value="{{ $datas->price }}" hidden="">
                            {{ $datas->quantity*$datas->price }}</td>
                        {{-- <td>
                            <a href="{{ route('user#deleteOrder',$carts->id) }}" onclick="return confirm('Are you sure delete?')" class="btn btn-danger">Delete</a>
                        </td> --}}
                      
                    </tr>
                    
                    @endforeach
                    {{-- @endif --}}
                  </table>
                  {{-- <div class="text-center">
                    <button class="btn btn-success">Confirm Order</button>
                  </div> --}}
            {{-- </form> --}}
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
