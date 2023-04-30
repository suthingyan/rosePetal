<nav class="navbar navbar-expand-lg fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href=""><h2>Rose <em>Petals</em></h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto fw-bold ">
          <li class="nav-item">
            <a class="nav-link" href="{{route('user#home')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user#ourProducts') }}">All Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user#aboutUsUser') }}">About Us</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('user#ContactUsUser') }}">Contact Us</a>
          </li> --}}
          <li class="nav-item">
            @if (Route::has('login'))
                @auth
                <?php
                $cart =App\Models\Cart::all();
                ?>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('user#showCart') }}">
                          Cart List [{{ $cart->count();}}]</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('user#orderConfirmList') }}">
                          Order List</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('user#adminConfirm') }}">
                          Invoice</a>
                      </li>
                      <x-app-layout>

                      </x-app-layout>
                @else
                    <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                    @if (Route::has('register'))
                       <li> <a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endif
                @endauth
            @endif
          </li>

        </ul>
      </div>
    </div>
  </nav>