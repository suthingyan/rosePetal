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
           <div class="mt-4">
           
            <h1 class="text-center mt-5 fw-bold fs-2 mb-3">Slider Store List</h1>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span class="mdi mdi-window-close"></span></button>
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr class="bg-dark text-white">
                        
                        <th>Id</th>
                        
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ (int)$item->id }}</td>
                        <td class="text-dark"><img src="{{ asset('product/images')}}/{{ $item->image }}" style="width: 200px; height:200px" alt=""></td>
                        <td>
                          <a href="{{ route('admin#sliderEdit',(int)$item->id) }}">
                            <button class="btn btn-sm btn-dark text-white">Edit</button>
                        </a>
                        <a href="{{ route('admin#sliderDelete',(int)$item->id) }}" onclick="return confirm('Are you sure delete?')">
                            <button class="btn btn-sm btn-dark text-white">Delete</button>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
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