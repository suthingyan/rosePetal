<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller bg-white">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       
        @include('admin.navbar')

        <!-- partial -->
        {{-- @include('admin.body') --}}
        
        <div class="container bg-white text-dark mt-5">
          <div class="mt-4 row">
            <div class="col-12">
              <div class="section-heading mt-3">
                {{-- <h2>Latest Products</h2>
                <a href="{{ route('user#ourProducts') }}">view all products <i class="fa fa-angle-right"></i></a> --}}
                <form style="float: right;" class="form-inline" method="get" action="{{ route('admin#searchProductList') }}">
                  @csrf
                      <div class="input-group mb-3">
                        <input type="search" class="form-control text-white" placeholder="Search product,category,price" name="searchList">
                        <input type="submit" class="btn btn-success" value="Search">
                      </div>
                      
                </form>
              </div>
            </div>
            <h1 class="text-center fw-bold fs-2 mb-3">Product List</h1>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span class="mdi mdi-window-close"></span></button>
            </div>
            @endif
            <div class="scrollable">
              <table class="table table-striped">
                <thead>
                    <tr class="bg-dark text-white">
                        
                        <th>Id</th>
                        {{-- <th>Category Title</th> --}}
                        <th>Sub Category</th>
                        <th>Product Code</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                    {{-- @foreach($order as $updataData) --}}
                    <tr>
                        <td>{{ $item->product_id }}</td>
                        {{-- <td>{{ $item->categoryTitle }}</td> --}}
                        <td>{{ $item->subCategory }}</td>
                        <td>{{ $item->productCode }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->description }}</td>
                        {{-- <td>{{ $item->quantity }}</td> --}}
                        <td>
                          {{ $item->quantity }}
                        </td>
                       <td>@if($item->status=='0')
                        Pending
                        @endif
                        @if($item->status=='1')
                        Featured
                        @endif
                        @if($item->status=='2')
                        Popular
                        @endif
                        </td>
                        <td ><img class="rounded-circle img-fluid" src="{{ asset('product/images')}}/{{ $item->image }}" style="height: 100px;" alt=""></td>
                        <td>

                          <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="actiondropdown" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </a>
                          
                            <ul class="dropdown-menu" aria-labelledby="actiondropdown">
                              <li>
                                <a class="dropdown-item" href="{{ route('admin#productEdit',$item->product_id) }}">
                                  <button class="btn btn-md btn-secondary text-dark px-auto text-primary">Edit</button>
                                </a></li>
                              <li>
                                <a class="dropdown-item" href="{{ route('admin#productDelete',$item->product_id) }}" onclick="return confirm('Are you sure delete?')">
                                  <button class="btn btn-md btn-secondary text-dark px-auto text-primary">Delete</button>
                                </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="{{ route('admin#pending',$item->product_id)}}" onclick="return confirm('Do you want to put in pending product')">
                                  <button class="btn btn-md btn-secondary text-dark px-auto text-primary" id="pending">Pending</button>
                                </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="{{ route('admin#featured',$item->product_id)}}" onclick="return confirm('Do you want to put in featured product')">
                                  <button class="btn btn-md btn-secondary text-dark px-auto text-primary" id="featured">Featured</button>
                                </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="{{ route('admin#popular',$item->product_id) }}" onclick="return confirm('Do you want to put in popular product')">
                                  <button class="btn btn-md btn-secondary text-dark px-auto text-primary" id="popular">Popular</button>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                    @endforeach
                    
                </tbody>
            </table>
            </div>
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