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
          <a href="{{ route('admin#storeAboutUs') }}" style="text-decoration: none;color:black"><i class="mdi mdi-keyboard-backspace"> Back</i></a>
        </div>
        <h1 class="text-dark pt-5 fs-2 text-center fw-bold">About Us Edit</h1>
        
        <form action="{{ route('admin#aboutUsUpdate',$editData->id) }}" method="post" enctype="multipart/form-data">
          @csrf
            
            <div class="row px-5 mt-5">
              <label for="description" class= "col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  {{-- <textarea name="" id="" class="form-control  text-white @error('description') is-invalid @enderror" cols="30" rows="30" style="background-color:grey">{{ old('description',$editData->description) }}</textarea> --}}
                  <input type="text" name="description" value="{{ old('description',$editData->description) }}" class="form-control text-white @error('description') is-invalid @enderror" style="background-color:grey" />
                  @error('description')
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