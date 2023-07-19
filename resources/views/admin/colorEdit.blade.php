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
       <div class="container text-dark">
        <div class="mt-5 fs-4 fw-bold mx-5">
          <a href="{{ route('admin#colorList') }}" style="text-decoration: none;color:black"><i class="mdi mdi-keyboard-backspace"> Back</i></a>
        </div>
        <h1 class="text-dark pt-5 fs-2 text-center fw-bold">Color Edit</h1>
        
        <form action="{{ route('admin#updateColor',$editData->color_id) }}" method="post" enctype="multipart/form-data">
          @csrf
            
            <div class="row px-5 mt-5">
              <label for="color" class= "col-sm-2 col-form-label">Color</label>
                <div class="col-sm-10">
                  <input type="text" name="color" value="{{ old('color',$editData->color) }}" class="form-control text-white @error('color') is-invalid @enderror" style="background-color:grey" />
                  @error('color')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                    
            </div>
            <div class="px-5 mt-3">
                    <input type="submit" name="" class="float-end btn btn-sm bg-dark text-white" value="Update" />
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