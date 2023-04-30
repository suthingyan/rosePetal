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
        <h1 class="text-dark pt-5 fs-2 text-center mb-5 fw-bold">Add Sub Category</h1>
        <form action="{{ route('admin#uploadSubCategory') }}" method="post" enctype="multipart/form-data">
          @csrf
          @if(Session::has('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span class="mdi mdi-window-close"></span></button>
        </div>
        @endif
          <div class="form-group row">
            <label for="categoryTitle" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select name="categoryTitle" class="form-control bg-light text-dark @error('categoryTitle') is-invalid @enderror">
                <option value="">Choose Sub Category</option>
                @foreach($data as $item)
                <option value="{{ $item->category_id }}">{{ $item->categoryTitle }}</option>
                @endforeach
                
              </select>
              @error('categoryTitle')                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="subCategory" class="col-sm-2 col-form-label">Sub Category</label>
            <div class="col-sm-10">
              <input type="text" name="subCategory" class="form-control bg-light text-dark @error('subCategory') is-invalid @enderror" placeholder="Category Name" name="name" required>
              @error('subCategory')
             {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn bg-dark text-white">Add</button>
            </div>
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