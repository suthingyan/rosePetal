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
                  @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span class="mdi mdi-window-close"></span></button>
            </div>
            @endif
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
                    @foreach ($order as $orders)
                    <tr class="">
                        <td>{{ $orders->name }}</td>
                        <td>{{ $orders->phone }}</td>
                        <td>{{ $orders->address }}</td>
                        <td>{{ $orders->productCode }}</td>
                        <td>{{ $orders->subCategory }}</td>
                        <td>{{ $orders->title }}</td>
                        <td>{{ $orders->price }}</td>
                        <td>{{ $orders->quantity }}</td>
                        <td>{{ $orders->price*$orders->quantity }}</td>
                        <td>{{ $orders->created_at->format('M d Y') }}</td>
                        <td>{{ $orders->status }}</td>
                        <td>
                            @if($orders->status=='accepted')
                            
                              <form action="{{ url('updateStatus',$orders->id) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-success" value="Accept" disabled>
                            </form>
                            
                            @else
                              <form action="{{ url('updateStatus',$orders->id) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-success" value="Accept">
                            </form>
                            
                            @endif
                            <br>
                            <form action="{{ route('admin#reject',$orders->id) }}" method="get">
                              @csrf
                              <input type="submit" class="btn btn-danger" value="Reject">
                          </form>
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