<div class="main-panel g-0 bg-light">
    <div class=" p-0 bg-light">
      <div class="card mb-3 h-75">
        
        <div class="card-body bg-light text-dark text-center mb-2">
          <h2 class="fs-1 fw-bolder">Welcome</h2>
          <p class="pt-3 fs-5 text-success">You are logged in!</p>
          
        </div>
        <div class="container bg-light">
          <div class="row mx-5">
            <div class="col-4 my-5">
              <div class="card w-50" style="background:pink;color:black">
                <div class="card-header">
                  Total Users
                
                  <?php
                  $user =App\Models\User::all();
                  ?>
                  <p class="counter">{{ $user->count(); }} Users</p>
                </div>
              </div>
            </div>
            <div class="col-4 my-5">
              <div class="card w-50" style="background:pink;color:black">
                <div class="card-header">
                  Total Categories
                
                  <?php
                  $category =App\Models\Category::all();
                  ?>
                  <p class="counter">{{ $category->count(); }} Categries</p>
                </div>
              </div>
            </div>
            <div class="col-4 my-5">
              <div class="card w-50" style="background:pink;color:black">
                <div class="card-header">
                  Total Sub Categories
                
                  <?php
                  $subCategory =App\Models\SubCategory::all();
                  ?>
                  <p>{{ $subCategory->count(); }} Sub Categories</p>
                </div>
              </div>
            </div>
            <div class="col-4 my-5">
              <div class="card w-50" style="background:pink;color:black">
                <div class="card-header">
                  Total Products
                
                  <?php
                  $product =App\Models\Product::all();
                  ?>
                  <p class="counter">{{ $product->count(); }} Products</p>
                </div>
              </div>
            </div>
            <div class="col-4 my-5">
              <div class="card w-50" style="background:pink;color:black">
                <div class="card-header">
                  Total Orders
                
                  <?php
                  $order =App\Models\Order::all();
                  ?>
                  <p class="counter">{{ $order->count(); }} Orders</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <img src="{{asset('/admin/assets/images/dashboard/istockphoto-1273915797-612x612.jpg')}}" class="card-img-bottom h-75" alt="..."> --}}
      </div>
      
    </div>
    
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    {{-- <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
      </div>
    </footer> --}}
    <!-- partial -->
  </div>
 