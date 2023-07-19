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
          <a href="{{ route('admin#productList') }}" style="text-decoration: none;color:black"><i class="mdi mdi-keyboard-backspace"> Back</i></a>
        </div>
        <h1 class="text-dark pt-5 fs-2 text-center fw-bold">Product Edit</h1>
        
        <form action="{{ route('admin#productUpdate',$editData->product_id) }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="text-center px-5 mt-5">
              <label for="image" class= "col-sm-2 col-form-label fs-4 fw-bolder">Old Image</label>
              <div class="d-flex justify-content-center">
                  <img src="{{ asset('product/images')}}/{{ $editData->image }}" class="img-thumbnail bg-dark" style="height: 200px;width:auto" alt="">
                  {{-- <input type="text" name="image" value="{{ old('image',$editData->image) }}" class="form-control text-white @error('image') is-invalid @enderror" style="background-color:grey" /> --}}
                  @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
            </div>
            {{-- <div class="px-5 mt-5 row">
              <label for="categoryTitle" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                <select name="categoryTitle" value="{{ old('categoryTitle',$editData->categoryTitle) }}" class="form-control bg-light text-dark @error('categoryTitle') is-invalid @enderror">
                  <option value="">Choose Category</option>
                  @foreach($category as $item)
                  <option value="{{ $item->categoryTitle }}">{{ $item->categoryTitle }}</option>
                  @endforeach
                  
                </select>
                @error('categoryTitle')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div> --}}
            <div class="px-5 mt-5 row">
              <label for="subCategory" class="col-sm-2 col-form-label">Sub Category</label>
              <div class="col-sm-10">
                <select name="subCategory" value="{{ old('subCategory',$editData->subCategory) }}" class="form-control bg-light text-dark @error('subCategory') is-invalid @enderror">
                  <option value="">Choose Category</option>
                  @foreach($subCategories as $item)
                  <option value="{{ $item->subCategory }}">{{ $item->subCategory }}</option>
                  @endforeach
                  
                </select>
                @error('subCategory')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="row px-5 mt-5">
              <label for="productCode" class= "col-sm-2 col-form-label">Product Code</label>
              <div class="col-sm-10">
                  <input type="text" name="productCode" value="{{ old('productCode',$editData->productCode) }}" class="form-control text-white @error('productCode') is-invalid @enderror" style="background-color:grey" />
                  @error('productCode')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
            </div>
            <div class="row px-5 mt-5">
                <label for="productTitle" class= "col-sm-2 col-form-label">Product Title</label>
                <div class="col-sm-10">
                    <input type="text" name="productTitle" value="{{ old('productTitle',$editData->title) }}" class="form-control text-white @error('productTitle') is-invalid @enderror" style="background-color:grey" />
                    @error('productTitle')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row px-5 mt-5">
                <label for="price" class= "col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" name="price" value="{{ old('price',$editData->price) }}" class="form-control text-white @error('price') is-invalid @enderror" style="background-color:grey" />
                    @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row px-5 mt-5">
                <label for="description" class= "col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" name="description" value="{{ old('description',$editData->description) }}" class="form-control text-white @error('description') is-invalid @enderror" style="background-color:grey" />
                    @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="px-5 mt-5 row">
              <label for="color" class="col-sm-2 col-form-label">Color</label>
              <div class="col-sm-10">
                <select name="color" class="form-control bg-light text-dark @error('color') is-invalid @enderror">
                  <option value="">Choose Color</option>
                  @foreach($color as $item)
                  <option value="{{ $item->color_id }}">{{ $item->color }}</option>
                  @endforeach
                  
                </select>
                @error('color')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="px-5 mt-5 row">
              <label for="size" class="col-sm-2 col-form-label">Size</label>
              <div class="col-sm-10">
                <select name="size" class="form-control bg-light text-dark @error('size') is-invalid @enderror">
                  <option value="">Choose Size</option>
                  @foreach($size as $item)
                  <option value="{{ $item->size_id }}">{{ $item->size }}</option>
                  @endforeach
                  
                </select>
                @error('size')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="row px-5 mt-5">
                <label for="quantity" class= "col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="text" name="quantity" value="{{ old('quantity',$editData->quantity) }}" class="form-control text-white @error('quantity') is-invalid @enderror" style="background-color:grey" />
                    @error('quantity')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row px-5 mt-5">
              <label for="image" class= "col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input type="file" name="image" value="{{ old('image',$editData->image) }}" class="form-control text-white @error('image') is-invalid @enderror" style="background-color:grey" />
                  @error('image')
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