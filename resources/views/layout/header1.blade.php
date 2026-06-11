<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>A-ha in Phnom Penh</title>
  <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous">
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
                  <span> Create Post </span>
                </a>
                <form action="/logout" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" style="background:none; border:none; color:white;">
                    <span> Log Out </span>
                  </button>
                </form>
              @else
                <a href="/dashboard" style="color:white; margin-right:10px;">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span> Dashboard </span>
                </a>
                <a href="/login" style="color:white;">
                  <span> Log In </span>
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
                <a href="/contact">Contact Us</a>
                <a href="/dashboard">Create Post</a>
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
            <nav class="nav nav-underline justify-content-between">
              <a class="nav-item nav-link {{ request()->is('home') ? 'active' : '' }}" href="/home">Home</a>
              <a class="nav-item nav-link {{ request()->is('allrestaurant') ? 'active' : '' }}" href="/allrestaurant">All</a>
              <a class="nav-item nav-link {{ request()->is('khmer') ? 'active' : '' }}" href="/khmer">Khmer</a>
              <a class="nav-item nav-link {{ request()->is('korean') ? 'active' : '' }}" href="/korean">Korean</a>
              <a class="nav-item nav-link {{ request()->is('japanese') ? 'active' : '' }}" href="/japanese">Japanese</a>
              <a class="nav-item nav-link {{ request()->is('chinese') ? 'active' : '' }}" href="/chinese">Chinese</a>
              <a class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact US</a>
            </nav>
          </div>
          <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
          <script src="{{ asset('js/bootstrap.js') }}"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
          <script src="{{ asset('js/custom.js') }}"></script>

@yield('content')