<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
       
      @include('admin.navbar')

      <!-- partial -->
      <div class="container-fluid bg-light page-body-wrapper">
        
        
            <div class="container" align="center">
                <div class="scrollable">
                  <table class="table table-striped table-bordered text-center mt-5 ">
                    <tr class="bg-dark text-white">
                        <th class="text-white">Customer Name</th>
                        <th class="text-white">Phone</th>
                        <th class="text-white">Address</th>
                        <th class="text-white">Product Code</th>
                        <th class="text-white">Sub Category</th>
                        <th class="text-white">Product Name</th>
                        <th class="text-white">Price</th>
                        <th class="text-white">Quantity</th>
                        <th class="text-white">Total Price</th>
                        <th class="text-white">Order Date</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Action</th>
                    </tr>
                    @foreach ($payment as $payments)
                    <tr class="">
                        <td>{{ $payments->name }}</td>
                        <td>{{ $payments->phone }}</td>
                        <td>{{ $payments->address }}</td>
                        <td>{{ $payments->productCode }}</td>
                        <td>{{ $payments->subCategory }}</td>
                        <td>{{ $payments->title }}</td>
                        <td>{{ $payments->price }}</td>
                        <td>{{ $payments->quantity }}</td>
                        <td>{{ $payments->price*$payments->quantity }}</td>
                        <td>{{ $payments->created_at->format('M d Y') }}</td>
                        <td>{{ $payments->status }}</td>
                        <td>
                            @if($payments->status=='accepted')
                            
                              <form action="{{ url('updateStatus',$payments->id) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-success" value="Payment Received" disabled>
                            </form>
                            
                            @else
                              <form action="{{ url('updateStatus',$payments->id) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-success" value="Payment Received">
                            </form>
                            
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                </div>
            </div>
        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.js')
  </body>
</html>