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
        <h1 class="text-dark pt-5 fs-2 text-center fw-bold">Slider</h1>
        <form action="{{ route('admin#uploadSlider') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row px-5 mt-5">
                <label for="description" class= "col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    {{-- <textarea name="description" id="" class="form-control bg-light text-dark @error('description') is-invalid @enderror" cols="30" rows="30" style="background-color:grey"></textarea> --}}
                    <input type="file" name="image" class="form-control bg-light text-dark @error('image') is-invalid @enderror" placeholder="About image fill here" />
                    @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                      
              </div>
            <div class="px-5 mt-3">
                    <input type="submit" name="" class="float-end btn btn-sm bg-dark text-white" value="Submit" />
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