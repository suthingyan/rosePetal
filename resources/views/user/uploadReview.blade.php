
      <div class="container-fluid page-body-wrapper bg-white ">
        <!-- partial -->
       <div class="container text-dark mt-5">
        {{-- <a href="{{ route('admin#product') }}"><i class="mdi mdi-keyboard-backspace"> Back</i> </a> --}}
        @if(Auth::user())
        <h1 class="text-dark pt-5 fs-2 text-center fw-bold">Send Feedback</h1>
        <form action="{{ route('user#uploadReview') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row px-5 mt-5">
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <label for="description" class= "text-dark col-2 col-form-label">Description</label>
                </div>
                  <div class="col-lg-10 col-sm-10 col-md-10">
                    {{-- <textarea name="description" id="" class="form-control bg-light text-dark @error('description') is-invalid @enderror" cols="30" rows="30" style="background-color:grey"></textarea> --}}
                    <textarea name="description" class="form-control" cols="30" rows="3" required></textarea>
                    @error('description')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                      
              </div>
            <div class="px-5 pb-5">
                <input type="submit" name="" class="float-end mt-3 btnPrimary btn btn-sm bg-dark text-white" value="Submit" />
            </div>
        </form>
        @else
        <div class=""></div>
            
        
        @endif
       </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    