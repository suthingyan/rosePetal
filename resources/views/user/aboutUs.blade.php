<!DOCTYPE html>
<html lang="en">

  <head>

   @include('user.css')
@php
   use App\Models\AboutUs; 
@endphp
  </head>

  <body>
   
    <!-- Header -->
  
      <header class="">
        @include('user.nav')
      </header>   
    <div class="page-heading about-heading header-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="text-content">
                <h2 class="text-white fw-bolder">About us</h2>
                <h2>Our Online Shop</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!-- profile section -->
  <section class="profile mt-5 mb-5">
   <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 mt-5">
       <img src="{{asset('admin\assets\images\dashboard\istockphoto-1273915797-612x612.jpg')}}" alt=""> 
      </div>
      <div class="col-lg-5 col-xl-5 col-md-12 mt-5">
        <h3 class=" fs-2 fw-bolder" style="color:hotpink">About Us</h3>
        <div class="row mt-3">
          <div class="col-lg-12">
            @foreach($about as $content)
                  
                  <p>{{ $content->description }}</p>
                  
                  @endforeach
          </div>
        </div>
      </div>
    </div>
   </div>
  
  </section>
  <section class="honor mt-5 mb-5">
    <div class="container">
      <div class="row">
        <div class="image">
          <img src="{{asset('images\happy-asian-teen-woman-sitting-sofa-holding-shopping-bags-smartphone-isolated-pink-background-shopper-shopaholic-concept_74952-2653.avif')}}" alt="">
          
            <h3>Easy To Purchase</h3>
          </div>
    </div>
    </div>
  </section>
      
  
      
      {{-- <div class="team-members">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Our Team Members</h2>
              </div>
            </div>
            @foreach($item as $aboutUs)
            <div class="col-md-4 h-100">
              <div class="team-member">
                <div class="thumb-container">
                  <img src="{{ asset('aboutUs/images')}}/{{ $aboutUs->tMImg }}" style="aspect-ratio:1/1" alt="">
                  <div class="hover-effect">
                    <div class="hover-content">
                      <ul class="social-icons">
                        <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
               
                <div class="down-content">
                  <h4>{{ $aboutUs->name }}</h4>
                  <span>{{ $aboutUs->role }}</span>
                  <p>{{ $aboutUs->description }}</p>
                </div>
                
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div> --}}
      <footer>
        @include('user.contactUs')
        <p class="my-3">Copyright &copy; 2023 rosePetals.com</p>
      </footer>
  
  
      @include('user.script')
  
  
    </body>
  
  </html>
  
