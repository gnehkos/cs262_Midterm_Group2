<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>A-ha in Phnom Penh</title>
  <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
    integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>

<body>
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="/home">
            <span>A-ha in Phnom Penh</span>
          </a>
          <div class="" id="">
            <div class="User_option">
              @auth
                <a href="/dashboard" style="color:white; margin-right:10px;">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span> Dashboard </span>
                </a>
                <form action="/logout" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" style="background:none; border:none; color:white;">
                    <span> Log Out </span>
                  </button>
                </form>
              @else
                <a href="/login" style="color:white; margin-right:10px;">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span> Log In </span>
                </a>
                <a href="/signup" style="color:white;">
                  <span> Sign Up </span>
                </a>
              @endauth
            </div>
            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <img src="{{ asset('images/menu.png') }}" alt="">
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="/home">Home</a>
                <a href="/allrestaurant">All Restaurants</a>
                <a href="/khmer">Khmer</a>
                <a href="/korean">Korean</a>
                <a href="/japanese">Japanese</a>
                <a href="/chinese">Chinese</a>
                <a href="/other">Other</a>
                <a href="/contact">Contact Us</a>
                @auth
                  <a href="/dashboard">Dashboard</a>
                @endauth
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <section class="slider_section">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="detail-box">
              <h1>Discover Restaurant And Food</h1>
            </div>
<nav class="nav nav-underline justify-content-between" style="position:relative; z-index:10; margin-bottom:40px; padding-bottom:10px;">
              <a class="nav-item nav-link {{ request()->is('/') || request()->is('home') ? 'active' : '' }}"
                href="/home">Home</a>
              <a class="nav-item nav-link {{ request()->is('allrestaurant') ? 'active' : '' }}"
                href="/allrestaurant">All</a>
              <a class="nav-item nav-link {{ request()->is('khmer') ? 'active' : '' }}" href="/khmer">Khmer</a>
              <a class="nav-item nav-link {{ request()->is('korean') ? 'active' : '' }}" href="/korean">Korean</a>
              <a class="nav-item nav-link {{ request()->is('japanese') ? 'active' : '' }}" href="/japanese">Japanese</a>
              <a class="nav-item nav-link {{ request()->is('chinese') ? 'active' : '' }}" href="/chinese">Chinese</a>
              <a class="nav-item nav-link {{ request()->is('other') ? 'active' : '' }}" href="/other">Other</a>
              <a class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
            </nav>
          </div>

          @yield('content')

          <section class="app_section">
            <div class="container">
              <div class="col-md-9 mx-auto">
                <div class="row">
                  <div class="col-md-7 col-lg-8">
                    <div class="detail-box">
                      <h2><span>Get the</span><br>A-ha App</h2>
                      <p>
                        Discover the best restaurants in Phnom Penh with A-ha in Phnom Penh App.
                        Explore Khmer, Chinese, Japanese, and Korean cuisines, browse restaurant recommendations,
                        check restaurant locations and opening hours, and find your next favorite place to eat anytime.
                      </p>
                      <div class="app_btn_box">
                        <a href="" class="mr-1"><img src="{{ asset('images/google_play.png') }}" class="box-img"
                            alt=""></a>
                        <a href=""><img src="{{ asset('images/app_store.png') }}" class="box-img" alt=""></a>
                      </div>
                      <a href="" class="download_btn">Download Now</a>
                    </div>
                  </div>
                  <div class="col-md-5 col-lg-4">
                    <div class="img-box">
                      <img src="{{ asset('images/mobile.png') }}" class="box-img" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <footer class="footer_section">
            <div class="container">
              <div class="row align-items-center py-1">

                <div class="col-md-4 text-center text-md-start mb-2 mb-md-0">
                  <span style="font-size:1.05rem; font-weight:700; letter-spacing:0.5px; color:white;">A-ha in Phnom
                    Penh</span><br>
                  <small style="opacity:0.85; color:white;">Discover &bull; Explore &bull; Enjoy</small>
                </div>

                <div class="col-md-4 text-center mb-2 mb-md-0">
                  <a href="/khmer" style="color:white; text-decoration:none; margin:0 6px; font-size:0.85rem;">Khmer</a>
                  <a href="/korean"
                    style="color:white; text-decoration:none; margin:0 6px; font-size:0.85rem;">Korean</a>
                  <a href="/japanese"
                    style="color:white; text-decoration:none; margin:0 6px; font-size:0.85rem;">Japanese</a>
                  <a href="/chinese"
                    style="color:white; text-decoration:none; margin:0 6px; font-size:0.85rem;">Chinese</a>
                  <a href="/other" style="color:white; text-decoration:none; margin:0 6px; font-size:0.85rem;">Other</a>
                </div>

                <div class="col-md-4 text-center text-md-end">
                  <small style="color:white;">&copy; <span id="displayYear"></span> A-ha in Phnom Penh. All rights
                    reserved.</small>
                </div>

              </div>
            </div>
          </footer>

          <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
          <script src="{{ asset('js/bootstrap.js') }}"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
            integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
          <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>