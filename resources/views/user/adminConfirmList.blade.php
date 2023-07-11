<!DOCTYPE html>
<html lang="en">

  <head>

   @include('user.css')

  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   --}}
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
  
      <header class="">
        @include('user.nav')
      </header>
    
      <div class="container-fluid">
        
        <section id="payment">
          <!-- Button trigger modal -->
          <div class="bg-light" style="padding: 100px 0px 0px 0px">
            
            <form action="" method="POST">
              @csrf
                <div class="container">
                  <div class="d-flex justify-content-center">
                      <button type="button" class="btn bg-danger text-white mb-3" data-bs-toggle="modal" data-bs-target="#rejectOrder">
                        Reject Order
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="rejectOrder" tabindex="-1" aria-labelledby="rejectOrderLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="rejectOrderLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <table class="table table-responsive-lg table-responsive-md table-responsive-sm table-hover" style="overflow-x:scroll">
                                <tr class="bg-dark text-white">
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                </tr>
                                @php
                                    $allTotal=0;
                                @endphp
                                @foreach($data as $datas)
                                @if($datas->status=='not accept')
                                <tr>
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
                                    <td>
                                        <input type="text" name="totalPrice[]" value="{{ $datas->totalPrice }}" hidden="">
                                        {{ $datas->quantity*$datas->price }}</td>
                                    
                                    @php
                                    $allTotal+=$datas->totalPrice;
                                    @endphp
                                </tr>
                                @endif
                                @endforeach
                                
                                <tr class="fw-bolder ">
                                  <td colspan="4" class="text-right">Total Price....</td>
                                  <td> {{ $allTotal }}</td>
                                </tr>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <table class="table table-responsive-lg table-responsive-md table-responsive-sm table-hover" style="overflow-x:scroll">
                    <tr class="bg-dark text-white">
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Total Price</th>
                    </tr>
                    @php
                        $allTotal=0;
                    @endphp
                    @foreach($data as $datas)
                    @if($datas->status=='accepted')
                    <tr>
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
                        <td>
                            <input type="text" name="totalPrice[]" value="{{ $datas->totalPrice }}" hidden="">
                            {{ $datas->quantity*$datas->price }}</td>
                            @php
                        $allTotal+=$datas->totalPrice;
                        @endphp
                        
                        
                        
                    </tr>
                    @endif
                    @endforeach
                    
                    <tr class="fw-bolder ">
                      <td colspan="4" class="text-right">Total Price....</td>
                      <td> {{ $allTotal }}</td>
                    </tr>
                  </table>
                  <div class="row">
                    <a href="" class="btn btnPrimary float-right mb-3" data-bs-toggle="modal" data-bs-target="#checkout">Checkout</a>
                  </div>
                <!-- Modal -->
                <div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                
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
  
