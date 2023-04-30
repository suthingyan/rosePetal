<!DOCTYPE html>
<html lang="en">

  <head>

   @include('user.css')

  </head>
    <body>
       <div class="container mt-5">
        <div class="mb-3">
          <a href="{{ route('user#showCart') }}" style="text-decoration:none;"><div class="mb-3 link-dark fw-bold"><i class="fas fa-arrow-left"></i>Back</div></a>
        </div>
        <h5 class="text-center">Edit Quantity</h5>
        {{-- @foreach($cart as $carts) --}}
        <form action="{{ route('user#updateOrderQty',$cart->id) }}" method="post">
        @csrf
        <div class="">
          <input type="number" name="quantity" class="form-control mt-2" placeholder="Enter product quantity "  value="" min="1" id="" required>
      </div>
      <div class="">
      <button type="submit" class="btn btn-success mt-3" >Update</button>
      </div>
      </form>
       </div>
        
        {{-- @endforeach --}}
    @include('user.script')


  </body>

</html>









