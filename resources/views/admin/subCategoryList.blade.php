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
              
            <h1 class="text-center mt-5 fw-bold fs-2 mb-3">Sub Category List</h1>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span class="mdi mdi-window-close"></span></button>
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr class="bg-light text-dark">
                        
                        <th>Id</th>
                        <th>Sub Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-light text-dark">
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->sub_id }}</td>
                        
                        <td>{{ $item->subCategory }}</td>
                        <td>
                            <a href="{{ route('admin#subCategoryEdit',$item->sub_id) }}">
                                <button class="btn btn-sm btn-dark text-white">Edit</button>
                            </a>
                            <a href="{{ route('admin#subCategoryDelete',$item->sub_id) }}" onclick="return confirm('Are you sure delete?')">
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