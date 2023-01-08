@extends('layouts.index')
@section('header')
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="/">OHaven<span>.</span></a></h1>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#cta">Near You</a></li>
          <li><a class="nav-link scrollto" href="#abt">About</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#login" class="get-started-btn scrollto">Log in</a>

    </div>
  </header><!-- End Header -->
@endsection

@section('mast')
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>OHaven<span>.</span></h1>
          <h2>Book Anywhere, Anytime.</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="">Booking Calendar</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="">VIP Benefits</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-wallet-line"></i>
            <h3><a href="">Payment Via Gcash</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-hotel-fill"></i>
            <h3><a href="">Search for Hotels Near You</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-database-2-line"></i>
            <h3><a href="">On Budget? No problem!</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-star-half-fill"></i>
            <h3><a href="">Hotel Ratings & Reviews</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

@endsection

@section('card')
<section id="cta" class="cta" height: auto;>
    <div class="container" data-aos="zoom-in">
      <div class="text-center">
        <h3>Best Hotels Near You</h3>
            <a class="cta-btn" href="#">Book Now!</a>
      </div>
      <div class="ssection">
        <div class='card' data-tilt data-tilt-glare data-tilt-max-glare="0.8" data-tilt-scale="1.1">
          <div><img src='assets/img/sofi.jpg' class='card-img'></div>
          <center>
          <div class="rating">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star unchecked"></span>
          <span class="fa fa-star unchecked"></span>
          </div>

          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          </p>  </center>
        </div>

        <div class='card' data-tilt data-tilt-glare data-tilt-max-glare="0.8" data-tilt-scale="1.1">
            <div><img src='assets/img/sofi.jpg' class='card-img'></div>
            <center>
            <div class="rating">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            </div>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p></center>
          </div>

          <div class='card' data-tilt data-tilt-glare data-tilt-max-glare="0.8" data-tilt-scale="1.1">
            <div><img src='assets/img/sofi.jpg' class='card-img'></div>
            <center>
            <div class="rating">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            </div>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p></center>
          </div>
    </div>
    </div>
  </section>
@endsection

@section('abt')
<section id="abt" class="abt">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>About Us</h3>
        <h1 class="logo me-auto me-lg-0"><a href="#">OHaven<span>.</span></a></h1>
      </div>

    </div>
  </section>
@endsection

@section('login')

    <!-- ======= Cta Section ======= -->


            <div id="login">

                <x-jet-authentication-card>
                    <x-slot name="logo">

                    </x-slot>

                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-label value="{{ __('Email') }}" />
                            <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label value="{{ __('Password') }}" />
                            <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/fgps">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-jet-button class="ml-4">
                                {{ __('Login') }}
                            </x-jet-button>

                            <x-jet-button class="ml-4">
                                <a href="/rg">
                                {{ __('Register') }}</a>
                            </x-jet-button>


                        </div>

                        <br>
                        or
                        <br>
                        <a href="auth/google" class="flex items-center justify-center px-6 py-3 mt-4 text-gray-600 transition-colors duration-300 transform border rounded-lg dark:border-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 mx-2" viewBox="0 0 40 40">
                                <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107" />
                                <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00" />
                                <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50" />
                                <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2" />
                            </svg>

                            <span class="mx-2">Sign in with Google</span>
                        </a>
                    </form>

                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/htel">
                        Hotel
                    </a>
                </x-jet-authentication-card>

        </div>

@endsection


@section('register')

<x-jet-authentication-card>
    <x-slot name="logo">

    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="user" required hidden/>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms"/>

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/lg">
                {{ __('Already registered?') }}
            </a>

            <x-jet-button class="ml-4">
                {{ __('Register')}}
            </x-jet-button>
        </div>
    </form>
</x-jet-authentication-card>
        </div>

@endsection

@section('fgps')
<x-jet-authentication-card>
    <x-slot name="logo">
        <x-jet-authentication-card-logo />
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <x-jet-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="block">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button>
                {{ __('Email Password Reset Link') }}
            </x-jet-button>
        </div>
    </form>


</x-jet-authentication-card>
@endsection

@section('about')
  <section id="about">
    <div class="container">

      <div class="about">


        <div class="info">
          <h5>EXPLORE</h5>
          <h2>About <span>O</span>'Haven</h2>
          <h3>We offer you a one-time and hassle-free reservation system that you deserve.</h3>
          <p>All hotel businesses can use the O'Haven Reservation System as a platform to easily share online information about their business. Its sole purpose is to make online bookings and promotions for hotel businesses faster and more convenient. Anyone with an account can use this user-friendly platform. It can also give the user or client pertinent information about the hotel nearby.</p>
          <p><span id="dots"></span><span id="more">O'Haven Reservation System made you to book a hotel room anytime and anywhere at your own pace. This platform provides an accurate and reliable process for every transaction. It is designed to manage all types of hotel bookings made directly by guests. Users can book online the appropriate suite that fits their budget and this platform offer a first come first serve rewards system that will give excitement to all the users.</span></p>

          <div class="col-xl-2 col-md-4">

            <button onclick="myFunction()" id="sh" class="cta-btn">Read more</button>
          </div>


          <script>
            function myFunction() {
              var dots = document.getElementById("dots");
              var moreText = document.getElementById("more");
              var btnText = document.getElementById("myBtn");
              if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
              } else {
                dots.style.display = "none";
                btnText.innerHTML = "Back";
                moreText.style.display = "inline";
              }
            }
          </script>
        </div>
      </div>
    </div>
  </section>
@endsection
