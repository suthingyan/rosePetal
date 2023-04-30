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
      <div class="container-fluid page-body-wrapper bg-white">
        <!-- partial -->
       <div class="container text-dark mt-5">
        {{-- <a href="{{ route('admin#product') }}"><i class="mdi mdi-keyboard-backspace"> Back</i> </a> --}}
        <h1 class="text-dark pt-5 mb-3 fs-2 text-center fw-bold">Add Category</h1>
        <form action="{{ route('admin#uploadCategory') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="categoryTitle" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <input type="text" name="categoryTitle" class="form-control bg-light text-dark @error('categoryTitle') is-invalid @enderror" placeholder="Category Name" name="name">
              @error('categoryTitle')
             {{ $message }}
              @enderror
            </div>
          </div>
         
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn bg-dark text-white">Add</button>
            </div>
          </div>
        </form>
       </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.js')
  </body>
</html>