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
        <h1 class="text-dark pt-5 fs-2 text-center fw-bold">Add Product</h1>
        <form action="{{ route('admin#uploadProduct') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="px-5 mt-5 row">
            <label for="categoryTitle" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select name="categoryTitle" class="form-control bg-light text-dark @error('categoryTitle') is-invalid @enderror">
                <option value="">Choose Category</option>
                @foreach($category as $item)
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
          <div class="px-5 mt-5 row">
            <label for="categoryTitle" class="col-sm-2 col-form-label">Sub Category</label>
            <div class="col-sm-10">
              <select name="subCategory" class="form-control bg-light text-dark @error('subCategory') is-invalid @enderror">
                <option value="">Choose Sub Category</option>
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
                  <input type="text" name="productCode" class="form-control bg-light text-dark @error('productCode') is-invalid @enderror" placeholder="Product Code fill here..."  />
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
                    <input type="text" name="productTitle" class="form-control bg-light text-dark @error('productTitle') is-invalid @enderror" placeholder="Product title fill here..."  />
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
                    <input type="text" name="price" class="form-control bg-light text-dark" placeholder="Product price fill here..." />
                </div>
            </div>
            <div class="row px-5 mt-5">
                <label for="description" class= "col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control bg-light text-dark" placeholder="Product description fill here..." />
                </div>
            </div>
            <div class="row px-5 mt-5">
                <label for="quantity" class= "col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="text" name="quantity" class="form-control bg-light text-dark" placeholder="Product quantity fill here..." />
                </div>
            </div>
            <div class="row px-5 mt-5">
              <label for="image" class= "col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input type="file" name="image" class="form-control bg-light text-dark" />
                </div>
                    
            </div>
            <div class="px-5 mt-5 row">
              
              <label for="color" class="col-sm-2 col-form-label">Color</label>
              <div class="col-sm-10">
                 <label>Select Color</label>
                 <hr>
                <div class="row">
                  @forelse($color as $item)
                  <div class="col-md-3">
                    <div class="p-2 border">
                      Color: <input type="checkbox" name="color[{{$item->color_id}}]" class="border border-dark bg-dark ms-3 me-2" value="{{$item->color_id}}">
                      {{$item->color}}
                      <br>
                      Quantity: <input type="number" name="colorquantity[{{$item->color_id}}]" style="width:70px;border:1px solid ">
                    </div>
                  </div>
                  @empty
                    <div class="col-md-12">
                      <h1>No colors found</h1>
                    </div>
                  
                  @endforelse
                </div>
                {{-- <select name="color" class="form-control bg-light text-dark @error('color') is-invalid @enderror">
                  <option value="">Choose Color</option>
                  @foreach($color as $item)
                  
                    <option value="{{ $item->color_id }}">{{ $item->color }}</option>
                  
                  @endforeach
                  
                </select> --}}
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